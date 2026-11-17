@echo off
set MYSQL=C:\xampp\mysql\bin\mysql.exe
set DB=projet_web
cd /d "%~dp0"
%MYSQL% -u root -e "DROP DATABASE IF EXISTS %DB%; CREATE DATABASE %DB% CHARACTER SET utf8mb4;"
for %%f in (migrations\V*.sql) do (
 echo %%f
 %MYSQL% -u root %DB% < "%%f" || (echo ERREUR dans %%f & pause & exit /b 1)
)
%MYSQL% -u root %DB% < seeds\donnees_test.sql
echo Base a jour.
pause