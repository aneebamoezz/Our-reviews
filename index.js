//local reviews data
const reviews = [
    {
        id:1,
        name:"susan smith",
        job:"web developer",
        img:"images/images.jpg",
        text:"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nisi unde porro maiores recusandae dolorem temporibus pariatur commodi exercitationem hic."
    },
    {
        id:2,
        name:"anna johnson",
        job:"web designer",
        img:"images/download (1).jpg",
        text:"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nisi unde porro maiores recusandae dolorem temporibus pariatur commodi exercitationem hic."
    },
    {
        id:3,
        name:"petter jones",
        job:"intern",
        img:"images/download (2).jpg",
        text:"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nisi unde porro maiores recusandae dolorem temporibus pariatur commodi exercitationem hic."
    },
    {
        id:4,
        name:"bill anderson",
        job:"the boss",
        img:"images/download (3).jpg",
        text:"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nisi unde porro maiores recusandae dolorem temporibus pariatur commodi exercitationem hic."
    }
];


// select items
const img = document.getElementById("person-img");
const author = document.getElementById("author");
const job = document.getElementById("job");
const info = document.getElementById("info");

const prevBtn = document.querySelector(".prev-btn")
const nextBtn = document.querySelector(".next-btn")
const randomBtn = document.querySelector(".random-btn")

//set starting item

let currentItem = 0;

//load initial item
window.addEventListener('DOMContentLoaded', function(){
    showPerson();
});

//show person based on item

function showPerson(){
    const item = reviews[currentItem];
    img.src = item.img;
    author.textContent = item.name;
    job.textContent = item.job;
    info.textContent = item.text;
}

//show next person 

nextBtn.addEventListener('click', function(){
    currentItem++;
    if(currentItem > reviews.length - 1){
       currentItem = 0;
    }
    showPerson();
})
//show prev person 

prevBtn.addEventListener('click', function(){
    currentItem--;
    if(currentItem < 0){
        currentItem = reviews.length  - 1;
    }
    showPerson();
})

//show random person 

randomBtn.addEventListener('click', function(){
    currentItem = Math.floor(Math.random() * reviews.length)
    console.log(currentItem)
    showPerson();
})










