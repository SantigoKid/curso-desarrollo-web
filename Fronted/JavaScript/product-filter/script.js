let products = {
    data: [
        {
            productName: "Regular White T-shirt",
            category: "Topwear",
            price: "30",
            image: "white-tshirt.jpg"
        },
        {
            productName: "Beige Short Skirt",
            category: "Bottomwear",
            price: "49",
            image: "short-skirt.jpg",
        },
        {
            productName: "Sporty SmartWatch",
            category: "Watch",
            price: "99",
            image: "sporty-smartwatch.jpg",
        },
        {
            productName: "Basic Knitted Top",
            category: "Topwear",
            price: "29",
            image: "knitted-top.jpg"
        },
    ],
};

for (let i of products.data) {
    // Create Card
    let card = document.createElement("div");
    // Card should have category and should stay hidden initialy
    card.classList.add("card", i.category, "hide");
    //image div
    let imgContainer= document.createElement("div");
    imgContainer.classList.add("image-container");
    // img tag
    let image = document.createElement("img");
    image.setAttribute("src", i.image);
    imgContainer.appendChild(image);
    card.appendChild(imgContainer);
    // container
    let container = document.createElement("div");
    container.classList.add("container");
    // product name
    let name = document.createElement("h5")
    name.classList.add("product-name");
    name.innerText = i.productName.toUpperCase();
    container.appendChild(name);
    // price
    let price = document.createElement("h6");
    price.innerText = "$" + i.price;
    container.appendChild(price);

    card.appendChild(container);
    document.getElementById("products").appendChild(card);
}
// parameter passed from button (Parameter same as a category)
function filterProduct(value) {
    // Button class code
    let buttons = document.querySelectorAll(".button-value");
    buttons.forEach((button) => {
        
    })
}