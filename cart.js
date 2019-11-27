if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItems)
    }

    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    var addToCartButtons = document.getElementsByClassName('add-to-cart')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var cartButtons = addToCartButtons[i]
        cartButtons.addEventListener('click', addToCartClicked)
    }

    document.getElementsByClassName('btn-checkout')[0].addEventListener('click', onCheckoutClick)

}


// Functions for cart manipulations
function onCheckoutClick() {
    var cartItems = document.getElementsByClassName('cart-items')[0]
    innerT = cartItems.parentElement.innerText

    // formatting the innerText to make it easier to parse
    var span = document.createElement('span')
    span.innerHTML = innerT
    remove_tags = span.innerText.replace('CART\nITEM\nPRICE\nQUANTITY\n', '')
    var find_remove = 'REMOVE'
    var re = new RegExp(find_remove, 'g')
    remove_tags = remove_tags.replace(re, '')
    remove_tags = remove_tags.replace('Go to checkout', '')
    console.log(remove_tags)



    // console.log(cartItems.parentElement.textContent)

    // while (cartItems.hasChildNodes()){
    //     console.log(cartItems.removeChild(cartItems.firstChild))
    //     cartItems.removeChild(cartItems.firstChild)
    // }
    //updateCartTotal()

    // "CART\nITEM\nPRICE\nQUANTITY\nBanana\n$0.50\nREMOVE\nStrawberry\n$0.90\nREMOVE\norange\n$0.50\nREMOVE\nWhole Milk\n$2.75\nREMOVE\nTotal $4.65\nGo to checkout"
}

function addToCartClicked(event) {
    var buttonClicked = event.target
    var storeItem = buttonClicked.parentElement.parentElement
    var title = storeItem.getElementsByClassName('pname')[0].innerText
    var price = storeItem.getElementsByClassName('price')[0].innerText
    var imgSrc = storeItem.getElementsByClassName('pimage')[0].src
    // console.log(title, price, imgSrc)
    addItemToCart(title, price, imgSrc)
    updateCartTotal()
}

function addItemToCart(title, price, imgSrc) {
    var cartRow = document.createElement('div')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    cartRow.classList.add('cart-row')
    // making sure there are no duplciate entires
    cartNames = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cartNames.length; i++) {
        if (cartNames[i].innerText == title) {
            alert('Item already in cart')
            return
        }
    }

    cartRowContents = `
    <div class="cart-item cart-column">
          <img class="cart-item-image" src="${imgSrc}" width="100" height="100">
          <span class="cart-item-title" name="product">${title}</span>
          <input type="hidden" name="product[]" value=${title}>
        </div>
        <span class="cart-price cart-column">${price}</span>
        <div class="cart-quantity cart-column">
          <input class="cart-quantity-input" type="number" value="1">
          <button class="btn btn-danger" type="button">REMOVE</button>
        </div>
    `
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItems)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
}

function removeCartItems(event) {
    // console.log('clicked')
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        // console.log(priceElement, quantityElement)
        var price = parseFloat(priceElement.innerText.replace('$', ''))
        var quantity = quantityElement.value
        var total = total + (price * quantity)
        // console.log(total)
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total
}

function quantityChanged(event) {
    var input = event.target
    // if the quantity is not a number or less than zero, default is 1
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}