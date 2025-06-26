# Platforma de e-learning - Mentora
1. Descriere generală
   Platforma creată, Mentora oferă utilizatorilor posibilitatea de a accesa cursurile online, de a fi evaluaţi prin quiy+uri şi de a obţine certificate de absolvire. Proiectul este realizat în PHP, MySQL şi stilizarea este făcută cu CSS.

   2. Funcţionalităţi principale
      - Autentificarea şi înregistrarea utilizatorilor;
      - Roluri multiple: administrator şi utilizator;
      - Adăugare cursuri (admin), cu titlu, descriere şi imagine;
      - Vizualizare cursuri(utilizatori);
      - Completare quiz;
      - Afişarea rezultatului în urma quiz-ului;
      - Generare certificat în format PDF.

    3. Livrabile
       - codul sursă complet;
       - Script SQL pentru structura bazei de date;
       - Fişiere principale:
               - index.php, login.php, register.php, dashboard.php, dashboard_admin.php, courses.php,add_courses.php, courses_user.php, quiz.php, add_questions.php, submit_quiz.php, results.php, certificate.php, logout.php.
       - Director uploads/ pentru imagini;
       - Director fpdf/ pentru generarea certificatului;

    4. Repository Git
       Adresa Git: https://github.com/RaeaLoreta/Licenta_Mentora/commits?author=RaeaLoreta

   5. Paşi de instalare:
       - instalarea XAMPP
       - copierea repository-ului în 'htdocs/'
       - pornire Apache şi MySQL din XAMPP
       - accesare 'https://localhost/phpmyadmin'
       - importul bazei de date 'database.sql' inclus în arhivă
       - accesarea 'http://localhost/elearning/'
       - crearea (register.php) sau autentificarea unui utilizator(login.php)
       - pagina te v-a redirecţiona la dashboard-ul corespunzător rolului (dashboard.php sau dashboard_admin.php)
       - dacă eşti administrator poţi vizualiza cursurile, dar şi adăuga un nou curs, accesând butonul 'Adaugă curs' din bara de navigare, iar selectând un curs îi poţi adăuga acestuia întrebări
       - dacă rolul tău este de utilizator, poţi accesa cursurile din bara de navigare şi selectând unul, poţi accesa quiz-ul corespunzător acestuia
       - la sfârşitul unui quiz ţi se v-a afişa scorul final, iar dacă scorul este pesste 70% se v-a afişa un buton ce te v-a duce la generarea certificatului PDF
       - tot în bara de navigare, ai un buton logout, care te v-a deconecta din sesiunea prezentă.
     
    6. Cerinţe
       - PHP 7.4+
       - MySQL 5.7+
       - Browser modern

    7. Alte resurse folosite
       - Biblioteca FPDF pentru generarea certificatelor
       - Style.css pentru a personaliza interfaţa

    
