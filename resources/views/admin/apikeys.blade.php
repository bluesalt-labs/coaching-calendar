@extends('layouts.admin')

@section('title', 'API Keys')

@section('scripts')
    @parent
    <script type="text/javascript" src="/js/app.js"></script>

    <script type="text/javascript">
        /*

        // GET /oauth/clients
        axios.get('/oauth/clients')
            .then(response => {
            console.log(response.data);
        });


         POST /oauth/clients
         const data = {
         name: 'Client Name',
         redirect: 'http://example.com/callback'
         };

         axios.post('/oauth/clients', data)
         .then(response => {
         console.log(response.data);
         })
         .catch (response => {
         // List errors on response...
         });


         // PUT /oauth/clients/{client-id}
         const data = {
         name: 'New Client Name',
         redirect: 'http://example.com/callback'
         };

         axios.put('/oauth/clients/' + clientId, data)
         .then(response => {
         console.log(response.data);
         })
         .catch (response => {
         // List errors on response...
         });


         // DELETE /oauth/clients/{client-id}
         axios.delete('/oauth/clients/' + clientId)
         .then(response => {
         //
         });
         */
    </script>
@endsection

@section('content')
    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
@endsection

