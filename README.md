##Esercizio Relazioni

Abbiamo qua di fronte un esempio di crud su post che mette insieme diverse relazioni.

Avremo la tabella posts che sarà collegata ad una e una sola categoria (le categorie invece saranno collegate a diversi post), e ad una ed una sola riga delle post information. Immaginiamo che questa terza tabella (post information) siano delle informazioni aggiuntive che vogliamo dare ai nostri post ma che per motivi di ordine e organizzazione preferiamo inserire in un'altra tabella.

Questo è uno dei codici base che potremmo utilizzare per ripassare questa importante parte di laravel.

Il nostro esercizio consisterà nel:

-   Creare una nuova tabella: Tags
-   Avrà una relazione con posts di tipo many to many.
-   La tabella dovrà avere due campi: title e slug
-   Una volta creata la migration e quindi la tabella aggiungere le funzioni che ci permetteranno di leggere le relazioni
-   Modificare la crud aggiungendo anche i tag

**Bonus**

-   Aggiungere anche i metodi: create, store e show
-   Aggiungere il seeder dei tag
-   Aggiungere la validazione lato client e lato back
