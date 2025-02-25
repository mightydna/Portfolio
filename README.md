# Portfolio-Website

## Über das Projekt
Dies ist meine Portfolio-Website mit einer angebundenen Datenbank zur Verwaltung von Kontaktdaten und Projektdaten. Die Website dient zur Präsentation meiner Arbeiten und bietet Besuchern die Möglichkeit, mich über ein Kontaktformular zu erreichen.

### Hauptfunktionen
- Darstellung meiner Projekte und Arbeiten
- Kontaktformular zur Erfassung von Anfragen
- Speicherung der Kontaktdaten in einer MySQL-Datenbank
- Automatische E-Mail-Benachrichtigung bei neuer Kontaktanfrage
- Projektdaten werden per SQL-Abfrage und später per AJAX dynamisch angezeigt

## Verwendete Technologien
- **Frontend**
  - HTML
  - LESS / CSS
  - JavaScript
  
- **Backend**
  - PHP
  - MySQL
  - AJAX
  - JSON
  
- **Tools & Bibliotheken**
  - Git
  - Composer
    - dotenv (Umgebungsvariablenverwaltung)
    - PHPMailer (Versand von E-Mails)

## Installation & Einrichtung
1. Repository klonen:
   ```sh
   git clone <repository-url>
   cd <projektordner>
   ```
2. Abhängigkeiten mit Composer installieren:
   ```sh
   composer install
   ```
3. `.env` Datei erstellen und konfigurieren (basierend auf `example.env`)
4. Datenbank einrichten:
   - MySQL-Datenbank erstellen
5. Lokalen Server starten oder Projekt auf Webserver bereitstellen

## Nutzung
Nach erfolgreicher Einrichtung ist die Portfolio-Website unter der entsprechenden URL erreichbar. Anfragen über das Kontaktformular werden automatisch in der Datenbank gespeichert und per E-Mail an mich weitergeleitet. Projektdaten werden dynamisch aus der Datenbank geladen und auf der Website dargestellt.

## Lizenz
Dieses Projekt steht unter keiner spezifischen Lizenz und ist nur für den persönlichen Gebrauch bestimmt.

## Kontakt
Falls Fragen oder Anregungen bestehen, kannst du mich über das Kontaktformular auf der Website erreichen.

