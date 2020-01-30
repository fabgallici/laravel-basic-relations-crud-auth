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

##Relations
Category 1 <> N Posts
Posts N <> N Tags
Post 1 <> 1 PostInformation
User 1 <> N Posts

##relazione unique tag_id post_id
usare
php artisan migrate:fresh --seed
perchè refresh da errore

##Possibilità di rimuovere singolo tag da un post(conservando il post stesso)

##Add user_id on post creation

##Authenticantion
composer require laravel/ui --dev

php artisan ui vue --auth

npm install && npm run dev

##show create post only if logged, save user_id on related post

##show edit/delete button only for logged related user

#user image
- inserted field 'image' in User table, fillable in model
- exdtracontroller setUserImage
- base.blade upload / show image

##API 
- api token in user factory, users table
- routes/api.php  route

ExtraController -> testGetToken
- return response() -> json('hello world'); 
  Postman: POST http://localhost:8000/api/user/token    //SEND
-   return response() -> json($data);   
    Postman: http://localhost:8000/api/user/token  //set keys
            Body --> x-www-form-urlencoded
            email: koch.maurice@example.org
            password: password
    //dovrebbe tornarmi json con email e password
- login attempt: Ora proviamo a loggare l'utente, se il login va a buon fine ritorniamo il token
- POST   http://localhost:8000/api/post/all
    Route::post('/post/all', 'ExtraController@getAllPost') -> middleware('auth.api');
    Ricevo tutti i post se fornisco l'api token in Postman
    Body-->x-www-form-urlencoded
        Key api_token
        value 'token' che leggo nel db associato all'user

## ajax (laravel contiene Cors Policies, quindi per accedere con ajax devo farlo all'interno del progetto, o con file.js in public)
<script src="{{ mix('js/app.js') }}"></script>

vedi chrome inspector-->console
$.ajax({
        url: "http://localhost:3000/api/post/all",  // su 8000 dava errore con browsersync?
-----
 $.ajax({
        url: "http://localhost:3000/api/post/user",
        method: "POST",