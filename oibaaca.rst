**Controller proses login**
stepnya
1. lu ngambil semua data yg ada di view lu kek (nama, user, passwoord, confirm-pass) dll
2. tulis tag if(!empty($_POST['//usernama atau yg mau lu jadiin patokan'])){}
   -gunanya untuk validasi biar jika ada manusia coba coba masuk di url gak bisa masu tu bocah
3. habis tu lu masukin semua atribut database semuanya  
4. bsi tu lu buat variable cek_username di dalamnya atribut *$this->db->get()*
5. bis tu lu buat logika if *if($cek_username->num_rows() > 0)* > 0 maksudnya ada data di situ
6. jika bener atau di koondisi pertama bener maka taruh set_flashdata isinya messege salahnya dimana lalu redirect lagi ke page register
7. jika salah kita buat logika if untuk password nya dan confirm passowrdnya **if($pass == $sonfirm_pass){**
8. jika bnr  atau semuanya sama 
       -save semuanya dalam atribut array save atau serah namanya lu
       -habis itu buat variable $cek di dalamnya ada atribut database **$this->db->insert('//nama table lu' , $save)** agar kita tau datanya masuk atau tidak 
9. bistu buat logika untuk $ceknya kalau masuk redirect ke login page  jangan lupa set flashdatanya
10.  kalau gak masuk redirect ke register page jgn lupa set flashdatanya
11. eits jangan lupa set logika salah buat no.7 