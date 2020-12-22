/*
Program pengurutan angka secara ascending
*/
// import library
#include <iostream>
#include <fstream>

using namespace std;

int main () {
    //melakukan deklarasi variabel terlebih dahulu
    string inp_angka;
    int deret_angka[50], panjang, jumlah_angka[10] = {0,0,0,0,0,0,0,0,0,0};
    int save;                                               // variabel bantu untuk memindahkan urutan angka
    ofstream masuk;                                         // variabel pengolah file 

    //memasukkan angka
    cout<<"Angka yang diinputkan : ";
    cin>>inp_angka;

    //menghitung panjang karakter
    panjang = inp_angka.length();

    // konversi karakter ke integer
    for (int i=0; i<panjang; i++)
	{
		deret_angka[i] = (int)inp_angka[i]-48;         
	}

    //mengurutkan angka menggunakan buble sort
    
    for (int i=0; i<panjang-1; i++)
    {
        for (int j=0; j<panjang-1-i; j++)
        {
            if (deret_angka[j]>deret_angka[j+1])
            {
                save=deret_angka[j]; 
                deret_angka[j]=deret_angka[j+1]; 
                deret_angka[j+1]=save;
            }
        }
    }

    //menamnbahkan jumlah angka ke array yang sesuai;
    for (int i=0; i<panjang; i++) {
        jumlah_angka[deret_angka[i]]++;
    }

    //menampilkan dan memasukkan ke dalam file
    masuk.open("hasil.txt");                            //membuka file yang bersangkutan 
    cout<<"Hasil "<<endl;
    for (int i=0; i<10; i++) {
        //menampilkan angka yang jumlahnya lebih dari 0
        if (jumlah_angka[i] > 0) {
            cout<<i<<" : "<<jumlah_angka[i]<<endl;      //menampilkan jumlah
            masuk<<i<<" : "<<jumlah_angka[i]<<endl;     // memasukkan kedalam file 
        }
    }
    masuk.close();                                      //menutup file
	
}
