@echo off
call flutter pub get
call dart run flutter_launcher_icons -f app_1.yaml
call flutter build apk --flavor appOne --dart-define=APP_URL=http://localhost/silidsched/api/public/