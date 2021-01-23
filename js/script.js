const keyword = document.getElementById('keyword');
const tombolCari = document.getElementById('tombol-cari');
const container = document.getElementById('container');

keyword.addEventListener('keydown',function(){
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET','ajax/siswa.php?keyword=' + keyword.value , true);
    xhr.send();
})

