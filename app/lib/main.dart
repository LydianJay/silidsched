import 'package:flutter/material.dart';
import 'package:flutter_inappwebview/flutter_inappwebview.dart';
import 'package:file_picker/file_picker.dart';
import 'package:url_launcher/url_launcher.dart';
import 'package:flutter_downloader/flutter_downloader.dart';
import 'dart:io';
import 'package:dio/dio.dart';
import 'package:permission_handler/permission_handler.dart';
import 'package:crypto/crypto.dart';
import 'dart:convert';

WebViewEnvironment? webViewEnvironment;

bool kDebugMode = true;
bool kIsWeb = false;
const defaultTargetPlatform = TargetPlatform.android;
@pragma('vm:entry-point')
void callProgressCallBack(String id, int status, int progress) {
  debugPrint("Download task ID: $id, status: $status, progress: $progress");
}

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await InAppWebViewController.setWebContentsDebuggingEnabled(true);
  await FlutterDownloader.initialize(debug: true, ignoreSsl: true);
  await FlutterDownloader.registerCallback(callProgressCallBack);
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'SilidSched',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
        useMaterial3: true,
      ),
      home: const MyHomePage(title: 'SilidSched'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key, required this.title});

  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  final GlobalKey webViewKey = GlobalKey();

  InAppWebViewController? webViewController;
  InAppWebViewSettings settings = InAppWebViewSettings(
      isInspectable: kDebugMode,
      mediaPlaybackRequiresUserGesture: false,
      allowsInlineMediaPlayback: true,
      iframeAllow: "camera; microphone",
      iframeAllowFullscreen: true);

  PullToRefreshController? pullToRefreshController;

  late ContextMenu contextMenu;
  String url = "https://uploader.nemsu-rfidas.site/";
  double progress = 0;
  final urlController = TextEditingController();

  @override
  void initState() {
    super.initState();

    contextMenu = ContextMenu(
        menuItems: [
          ContextMenuItem(
              id: 1,
              title: "Special",
              action: () async {
                debugPrint("Menu item Special clicked!");
                debugPrint(await webViewController?.getSelectedText());
                await webViewController?.clearFocus();
              })
        ],
        settings: ContextMenuSettings(hideDefaultSystemContextMenuItems: false),
        onCreateContextMenu: (hitTestResult) async {
          debugPrint("onCreateContextMenu");
          debugPrint(hitTestResult.extra);
          debugPrint(await webViewController?.getSelectedText());
        },
        onHideContextMenu: () {
          debugPrint("onHideContextMenu");
        },
        onContextMenuActionItemClicked: (contextMenuItemClicked) async {
          var id = contextMenuItemClicked.id;
          debugPrint("onContextMenuActionItemClicked: " +
              id.toString() +
              " " +
              contextMenuItemClicked.title);
        });

    pullToRefreshController = kIsWeb ||
            ![TargetPlatform.iOS, TargetPlatform.android]
                .contains(defaultTargetPlatform)
        ? null
        : PullToRefreshController(
            settings: PullToRefreshSettings(
              color: Colors.blue,
            ),
            onRefresh: () async {
              if (defaultTargetPlatform == TargetPlatform.android) {
                webViewController?.reload();
              } else if (defaultTargetPlatform == TargetPlatform.iOS) {
                webViewController?.loadUrl(
                    urlRequest:
                        URLRequest(url: await webViewController?.getUrl()));
              }
            },
          );
  }

  @override
  void dispose() {
    super.dispose();
  }

  Future<void> downloadFileWithSession(String url, String sessionCookie) async {
    try {
      final dio = Dio();
      final dir = Directory('/storage/emulated/0/Download');
      final hashed = md5.convert(utf8.encode(url)).toString();
      final fileName = "$hashed.docx";
      final savePath = "${dir.path}/$fileName";
      debugPrint("Downloading file to $savePath");
      final response = await dio.download(
        url,
        savePath,
        options: Options(
          headers: {
            "Cookie": "laravel_session=$sessionCookie",
          },
          responseType: ResponseType.bytes,
          followRedirects: true,
        ),
      );

      if (response.statusCode == 200) {
        debugPrint("File downloaded to $savePath");
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(content: Text("Download completed!")),
        );
      } else {
        debugPrint("Download failed: ${response.statusCode}");
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text(response.statusCode.toString())),
        );
      }
    } catch (e) {
      debugPrint("Download error: $e");
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text(e.toString())),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        resizeToAvoidBottomInset: false,
        body: SafeArea(
            child: Column(children: <Widget>[
          Expanded(
            child: Stack(
              children: [
                InAppWebView(
                  key: webViewKey,
                  webViewEnvironment: webViewEnvironment,
                  initialUrlRequest: URLRequest(url: WebUri(url)),
                  // initialUrlRequest:
                  // URLRequest(url: WebUri(Uri.base.toString().replaceFirst("/#/", "/") + 'page.html')),
                  // initialFile: "assets/index.html",
                  initialSettings: settings,
                  contextMenu: contextMenu,
                  pullToRefreshController: pullToRefreshController,
                  onWebViewCreated: (controller) async {
                    webViewController = controller;
                  },
                  onLoadStart: (controller, url) {
                    setState(() {
                      this.url = url.toString();
                      urlController.text = this.url;
                    });
                  },
                  onPermissionRequest: (controller, request) async {
                    return PermissionResponse(
                        resources: request.resources,
                        action: PermissionResponseAction.GRANT);
                  },
                  shouldOverrideUrlLoading:
                      (controller, navigationAction) async {
                    var uri = navigationAction.request.url!;

                    if (![
                      "http",
                      "https",
                      "file",
                      "chrome",
                      "data",
                      "javascript",
                      "about"
                    ].contains(uri.scheme)) {
                      if (await canLaunchUrl(uri)) {
                        // Launch the App
                        await launchUrl(
                          uri,
                        );
                        // and cancel the request
                        return NavigationActionPolicy.CANCEL;
                      }
                    }

                    return NavigationActionPolicy.ALLOW;
                  },
                  onLoadStop: (controller, url) {
                    pullToRefreshController?.endRefreshing();
                    setState(() {
                      this.url = url.toString();
                      urlController.text = this.url;
                    });
                  },
                  onReceivedError: (controller, request, error) {
                    pullToRefreshController?.endRefreshing();
                  },
                  onProgressChanged: (controller, progress) {
                    if (progress == 100) {
                      pullToRefreshController?.endRefreshing();
                    }
                    setState(() {
                      this.progress = progress / 100;
                      urlController.text = this.url;
                    });
                  },
                  onUpdateVisitedHistory: (controller, url, isReload) {
                    setState(() {
                      this.url = url.toString();
                      urlController.text = this.url;
                    });
                  },
                  onConsoleMessage: (controller, consoleMessage) {
                    debugPrint(consoleMessage.toString());
                  },
                  onDownloadStartRequest:
                      (controller, downloadStartRequest) async {
                    String? url = downloadStartRequest.url.toString();
                    // String? filePath =
                    //     await FilePicker.platform.getDirectoryPath();

                    CookieManager cookieManager = CookieManager.instance();
                    List<Cookie> cookies =
                        await cookieManager.getCookies(url: WebUri(this.url));

                    String? sessionCookie = cookies
                        .firstWhere((c) => c.name == "laravel_session",
                            orElse: () => Cookie(name: "empty"))
                        .value;

                    if (sessionCookie != null && sessionCookie.isNotEmpty) {
                      Permission.storage.request().then((status) async {
                        if (status.isGranted) {
                          await downloadFileWithSession(url, sessionCookie);
                          debugPrint("Storage permission granted");
                        } else {
                          debugPrint("Storage permission denied");
                        }
                      });
                    } else {
                      debugPrint("Session cookie not found.");
                    }
                    // if (filePath != null) {
                    //   final taskId = await FlutterDownloader.enqueue(
                    //     url: url,
                    //     savedDir: filePath,
                    //     showNotification: true,
                    //     openFileFromNotification: true,
                    //   );
                    //   debugPrint(
                    //       "Download task ID: $taskId for $url, path: $filePath");
                    // }
                  },
                ),
                progress < 1.0
                    ? LinearProgressIndicator(value: progress)
                    : Container(),
              ],
            ),
          ),
        ])));
  }
}
