
# Company Manager API

**Prosty system zarządzania firmami i pracownikami** z możliwością dodawania, edytowania, usuwania oraz przeglądania danych. Projekt składa się z backendu PHP (Laravel), który udostępnia REST API do zarządzania firmami i ich pracownikami. API wykorzystuje dobre praktyki wytwarzania oprogramowania, w tym walidację danych, relacje Eloquent oraz oddzielone klasy FormRequest.

# Instalacja
Należy wykonać następujące komendy

    git clone https://github.com/rafauan/company-manager-api
    cd company-manager-api/
    composer install
    php artisan server
Serwer działa na adresie http://127.0.0.1:8000 albo na http://localhost:8000.
Do repozytorium zostały dodane pliki database.sql i .env, więc migracja nie jest wymagana.

## 📌 Endpointy API

| Metoda | Endpoint                  | Opis                                  |
|--------|---------------------------|---------------------------------------|
| GET    | /api/companies            | Pobierz listę wszystkich firm         |
| POST   | /api/companies            | Dodaj nową firmę                      |
| GET    | /api/companies/{id}       | Pobierz dane konkretnej firmy         |
| PATCH  | /api/companies/{id}       | Zaktualizuj dane firmy                |
| DELETE | /api/companies/{id}       | Usuń firmę                            |
| GET    | /api/employees            | Pobierz listę wszystkich pracowników  |
| POST   | /api/employees            | Dodaj nowego pracownika               |
| GET    | /api/employees/{id}       | Pobierz dane konkretnego pracownika   |
| PATCH  | /api/employees/{id}       | Zaktualizuj dane pracownika           |
| DELETE | /api/employees/{id}       | Usuń pracownika                       |

W pliku `company_manager.postman_collection.json` znajduje się dokumentacja Postman.
