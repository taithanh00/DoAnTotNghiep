gsap.registerPlugin(ScrollTrigger);

let box = document.querySelector(".left");

ScrollTrigger.create({
    start: 0,
    end: "max",
    onUpdate: updateValues,
});

function updateValues() {
    console.log(ScrollTrigger.isInViewport(box));
    // position.innerText = ScrollTrigger.positionInViewport(box, "center").toFixed(2);
}
updateValues();
alert("as");