function checkPalindrome(inputString) {
    let strArray = inputString.toLowerCase().split('');
    let newArr = strArray.join('');
    let revArr =  [...newArr].reverse().join('')

    if ( newArr === revArr) {
        return true;
    } else {
        return false;
    }
}

let a = "radar"
let b = "Malam"
let c = "kasur ini rusak"
let d = "ibu ratna antar ubi"
let e = "Malas"
let f = "Makan nasi goreng"
let g = "Balonku ada lima"

if(checkPalindrome(a)==true){
	console.log(a+"	#--> Palindrome");
}
else{
console.log(a+"#--> Not Palindrome");
}

if(checkPalindrome(b)==true){
	console.log(b+"	#--> Palindrome");
}
else{
console.log(b+"	#--> Not Palindrome");
}

if(checkPalindrome(c)==true){
	console.log(c+"	#--> Palindrome");
}
else{
console.log(c+"	#--> Not Palindrome");
}

if(checkPalindrome(d)==true){
	console.log(d+"	#--> Palindrome");
}
else{
console.log(d+"	#--> Not Palindrome");
}

if(checkPalindrome(e)==true){
	console.log(e+"	#--> Palindrome");
}
else{
console.log(e+"	#--> Not Palindrome");
}

if(checkPalindrome(f)==true){
	console.log(f+"	#--> Palindrome");
}
else{
console.log(f+"	#--> Not Palindrome");
}

if(checkPalindrome(g)==true){
	console.log(g+"	#--> Palindrome");
}
else{
console.log(g+"	#--> Not Palindrome");
}