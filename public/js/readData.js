function readData(numberPage , numberShow = 0) {
    var page = $("#currentpage").val();
    $.ajax({
        type: "GET",
        dataType: 'json',
        url: '{{ route("list-client.read") }}',
        success: function(readData) {
            var data = '';
            let adulte = readData.adulte;
            //count length
            let countUsers = adulte.length;
            let Enfant = readData.Enfant;
            countUsers += adulte.length;
            read = adulte.concat(Enfant);
            read.sort((s1, s2) => s2.idClient - s1.idClient);
            $.each(read, function(key, value) {
                if( key <= numberShow && numberShow != 0 ){
                    return false;
                }
                let photo;
                if (read[key].photo !== null) {
                    photo =
                        `<img src="storage/${read[key].photo}" alt="non" class="w-100 h-100">`;
                } else {
                    photo = `<i class="bi bi-person-fill w-100 h-100"></i>`;
                }
                data += `<tr class = "dataUsers">
                    <td onclick ="showData(${read[key].idClient});" ><a href="#" id = "showData" onclick="showUser();">
                        <div class = 'image overflow-hidden position-relative'>
                            ${photo}
                            <div class="display-flex-center"><span>Show</span> </div>
                        </div>
                        </a></td>
                    <td>${read[key].idClient}</td>
                    <td>${read[key].type} </td>
                    <td>${read[key].nom} ${read[key].Prenom}</td>
                    <td>${read[key].Sexe}</td>
                    <td>${read[key].DateNaissance}</td>
                    <td>+212 ${read[key].tel}</td>
                    <td>${read[key].Address}</td>
                </tr>`;


            });
            let pageTotal = Math.ceil(parseInt(countUsers) / 10);
            const currentpage = $('#currentpage').val();
            pagination(pageTotal, currentpage);
            $('tbody').html(data);
        },
        error: function(e) {

        }

    })
}
readData();

function claerData() {
    var form = $("#formAddUser")[0].reset();
}