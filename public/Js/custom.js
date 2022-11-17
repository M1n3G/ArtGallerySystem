<script>
$(document).ready(function()){

    //Get category ID
    @foreach(App\Models\Art::all() as $catList)
    $("#findBtn").click(function(){
        var cat = $("#cat{{$catList->id}}").val();

        $.ajax({
            type:'get',
            dataType:'html',
            url:'{{url}}'
        })


    })
}

</script>