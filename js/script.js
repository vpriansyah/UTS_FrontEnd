var id_motor = document.getElementById('id_motor');
var nama = document.getElementById('nama');
var harga = document.getElementById('harga');
var tahun = document.getElementById('tahun');
var select = document.getElementById('select');
var container = document.getElementById('container');
var datane = document.getElementById('datane');
var jumlah = document.getElementById('jumlah');
var coba = document.getElementById('coba');
var id = document.getElementById('idnya');
var btn = document.getElementById('btn');
var cal = document.getElementById('cal');
var final = document.getElementById('final');
var del = document.getElementById('del');
[id_motor, nama, harga, tahun].forEach((element)=>{
    element.addEventListener('keyup', function(){
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                container.innerHTML = xhr.responseText;
            }
        }
        xhr.open('GET', 'ajax/motor.php?id_motor='+element.value, true);
        xhr.send();
    });
});

function sendData(){
    var select = document.getElementById("select").value;
    var httpr = new XMLHttpRequest();
    httpr.open("POST", "ajax/tambah.php", true);
    httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    httpr.onreadystatechange=function(){
        if(httpr.readyState == 4 && httpr.status == 200){
            //Tidak dilakukan aksi
        }
    }
    httpr.send("select="+select);
}

function kolom(kolom){
    var datane = document.getElementById('datane');
    console.log(kolom);
    //var id = document.getElementById("btn"+kolom).value;
    var jumlah = document.getElementById("jumlah"+kolom).value;
    console.log(jumlah);
    //console.log(document.getElementById("jumlah"+kolom).value);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/jumlah.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange=function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            datane.innerHTML = xhr.responseText;
        }
    }
    xhr.send("id="+kolom+"&jumlah="+jumlah);
}

cal.addEventListener('click', function(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            final.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', 'ajax/total.php', true);
    xhr.send();
});

del.addEventListener('click', function(){
    var tanya = confirm("Apakah Anda Yakin Untuk Menghapus Transaksi");
    if(tanya == true){
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                window.location = "../UTS_frontend/index.php";
            }
        }
        xhr.open('GET', 'ajax/delete.php', true);
        xhr.send();
    }
});