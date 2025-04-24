@echo off
call flutter pub get
call dart run flutter_launcher_icons -f app_1.yaml
call flutter run --flavor appOne --dart-define=APP_URL=http://192.168.1.52/silidsched/api/public/