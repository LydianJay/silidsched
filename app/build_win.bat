@echo off
call flutter pub get
call dart run flutter_launcher_icons -f app_1.yaml
call flutter build apk --flavor appOne --dart-define=APP_URL=https://silidsched.nemsu-rfidas.site/
call flutter pub get
call dart run flutter_launcher_icons -f app_2.yaml
call flutter build apk --flavor appTwo --dart-define=APP_URL=https://uploader.nemsu-rfidas.site/