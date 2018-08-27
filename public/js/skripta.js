function registracija(){
        var greske=[];
        var username=document.querySelector('#username').value;
        var password=document.querySelector('#password').value;
        var email=document.querySelector('#email').value;
        var telefon=document.querySelector('#telefon').value;
        var reemail=/^[a-zA-Z0-9.]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        var retelefon=/^[+0-9]{8,15}$/;
        var repassword=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}$/;
        var reusername=/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/;

        if(!reusername.test(username)){
            greske.push("<p class='text-danger'>username nije u dobrom formatu!</p>");
        }
        if(!repassword.test(password)){
            greske.push("<p class='text-danger'>password nije u dobrom formatu!'</p>");

        }
        if(!retelefon.test(telefon)){
            greske.push("<p class='text-danger'>telefon nije u dobrom formatu!</p>");

        }
        if(!reemail.test(email)){
            greske.push("<p class='text-danger'>email nije u dobrom formatu!</p>");
        }
        if(greske.length>0){
            var greska='';
            for(i=0;i<greske.length;i++){
                greska+=greske[i];
                document.querySelector("#greske").innerHTML=greska;

            }
            return false;
        }
        if(greske.length==0){
            document.querySelector('#greske').innerHTML+=("<p class='text-success'>Uspesno ste se Registrovali</p>");
            return true;


        }
}
$(document).ready(function(){
    $('.sortiranje').click(function(){
        var slovo=$(this).text();
        $.ajax({
            url:'http://one-movies.roughlycoding.rs/public/sortiraj/'+slovo,
            type:"GET",
            dataType:"Text",
            success:function(sortirani){
              var niz=sortirani.slice(1);
                var ispis="";
                var brojac=0;
              niz=jQuery.parseJSON(niz);
              $.each(niz,function(index,film){
               brojac++
               ispis+=` <tr>
                  <td>`+brojac+`</td>
                  <td class="w3-list-img"><a href="single/`+film.id_filma+`"><img src="images/`+film.putanja+`" alt="" /> <span>`+film.ime+`</span></a></td>
                  <td>`+film.datum_dodavanja+`</td>
                  <td class="w3-list-info"><a href="genres.html"></a>`+film.naziv+`</td>
                  </tr>`

              });
                $('#lista').html(ispis);

            },
            error : function(sortirani) {
                //console.log(sortirani.responseText);
            }


        });
    });
    $('.zanr').click(function(){
        var zanr=$(this).text();
        $.ajax({
            type:'GET',
            url:'http://one-movies.roughlycoding.rs/public/sortirajZanr/'+zanr,
            success:function(filmovi){
               var ispis=""
                $.each(filmovi,function(index,film){
                    ispis+=` <div class="col-md-2 w3l-movie-gride-agile">
                                <a href="single/`+film.id_filma+`"  class="hvr-shutter-out-horizontal"><img style="height:200px;width:150px" src="images/`+film.putanja+`" title="album-name" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single/`+film.id_filma+`">`+film.ime+`</a></h6>
                                    </div>
                                    <div class="mid-2">

                                        <p>`+film.datum_dodavanja+`</p>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                                <div class="ribben two">
                                    <p>NEW</p>
                                </div>
                            </div>`
                });
               $('#filmovi').html(ispis);
               $('#render').html("");
            }
        });
    });
   
    $('#anketaform').on('click','button', function (e) {
        e.preventDefault();
        var zanrId=$('input[name=zanr]:checked').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            data:{zanrid:zanrId},
            url: 'http://one-movies.roughlycoding.rs/public/anketaa',
            success:function (res) {
                console.log(res);
                $respond=res;
                if($respond == 1){
                    alert('ne mozete dva puta glasati');
                }
                else if($respond == 2){
                    alert('Dobar izbor!');
                }
                else alert('ne mozete dva puta glasati');

            }
        });
    });
});
