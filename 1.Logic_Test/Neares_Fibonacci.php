<div id=angka></div>
<div id=hasil></div>
<div id=tambah></div>
<div id=fibo></div>
<script>
function nearestFibonacci(num)
{	
	if (num == 0) {
		document.write(0);
		return;
	}
	let first = 0, second = 1;
	let third = first + second;
	while (third <= num) {
		first = second;
		second = third;
		third = first + second;
	}
	let ans = (Math.abs(third - num)
			>= Math.abs(second - num))
				? second
				: third;
	let add =ans-num;
	document.write("Fibonacci terdekat = "+ans+"<br>");
	document.write("yang perlu ditambahkan untuk mencapai fibo  = "+add)
}
	
	let a = [15,1,3];
	let N = a[0]+a[1]+a[2];
	document.getElementById("angka").innerHTML = ("Angka yang dimasukan = "+a[0]+","+a[1]+","+a[2]);
	document.getElementById("hasil").innerHTML = ("Jumlah angka yang dimasukan  = "+N);
	nearestFibonacci(N);
</script>
