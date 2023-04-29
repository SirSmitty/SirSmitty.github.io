//Highlight selected option for Shop Item (eg. S M L XL)
const itemOptionButtonList = document.querySelectorAll('.itemOptionButton')

itemOptionButtonList.forEach(button=> {
    button.addEventListener('click', () => {
        document.querySelector('.itemOptionButtonHighlight')?.classList.remove('itemOptionButtonHighlight')
        button.classList.add('itemOptionButtonHighlight')
    })
})