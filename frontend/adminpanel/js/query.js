const detailCardContainer = document.getElementById('detailcardcontainer');
const textCardContainer = document.getElementById('textcardcontainer');
const card=document.getElementById('card');
const button=document.getElementById('btn');
function fetchDataById(id) {
    return {
        id: id,
        title: 'Card Title ' + id,
        content: 'Card Content ' + id
    };
}function createCard(data) {
    const card = document.createElement('div');
    card.classList.add('card');
    card.innerHTML = `
    `;
    return card;
}const id = 1;
const detailData = fetchDataById(id);
const detailCard = createCard(detailData);
detailCardContainer.appendChild(detailCard);
const textCard = createCard(1);
textCardContainer.appendChild(textCard);
button.addEventListener('click',fun);
function fun(){
    const text=document.getElementById('textcardcontainer').value;
    console.log(text);
}
  