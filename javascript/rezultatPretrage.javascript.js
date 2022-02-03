$('#search-button').click(()=>{
    document.getElementById('rezultat_pretrage').innerHTML="";
    let search = document.getElementById('search-main').value;
    $.ajax({
        url: './includes/search_rezultat.inc.php',
        method: 'post',
        data:{
            'searchParam':search
        },
        success:(response)=>{
            //console.log(response);
            $res = JSON.parse(response);
            for(let i=0; i<$res.length;i++){
                let data = document.createElement("div");
                data.innerHTML += "<span>"+$res[i]['username']+"</span>";
                $('#rezultat_pretrage').append(data);

            }
        }
    })
})