<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form  method="" id="ff">
        <input type="text">
        <input type="text">
        <input type="text">
        <button id="valider" type="button">Valider</button>
    </form>
    {{-- @foreach($etudiants as $etudiant)
    {{$etudiant->nom}}
    @endforeach

    @foreach($groupe as $groupe)
    {{$groupe->nom}}
    @endforeach --}}
    @foreach($groupe as $groupe)
    <p>{{$groupe->nomG}}</p> 
    @endforeach
    <script>
            $(document).ready(function(){
                $('#valider').click(function(){
                    // $('#liste').modal('hide');
                    var data = $('#ff').serialize();
                    alert(data);
                    // $.ajax({
                    //     type:'get',
                    //     data:data,
                    //     url:'presence/liste',
                    //     success:function
                    // })
    
                })
            })
        </script>
</body>
</html>