const nav = document.getElementById('nav');
let item = document.getElementById('item-earth');
if(item){
	item.style.border = "1px solid white"
}

nav.addEventListener('click',(e)=>{
	
	const selectedItem = e.target.href.split("#")[1]

	if(item && item.id.split("-")[1] !== selectedItem.toLowerCase()){
		console.log(item.id.split("-")[1], selectedItem.toLowerCase())
		item.style.border= 'none'
	}
	
	item = document.getElementById(`item-${selectedItem.toLowerCase()}`)
	item.style.border="1px solid white"
})