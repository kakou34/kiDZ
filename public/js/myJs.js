//function to add sound effects to navigation bar items
$("#navbarContent a")
    .each(function(i) {
        if (i != 0) {
            $("#sound")
                .clone()
                .attr("id", "sound" + i)
                .appendTo($(this).parent());
        }
        $(this).data("beep", i);
    })
    .mouseenter(function() {
        $("#sound" + $(this).data("beep"))[0].play();
    });
$("#sound").attr("id", "sound0");



//play paper sound effects when passing mouse over elements
var paperAudio = document.getElementById("paperAudio");
function playPaperAudio() {
    paperAudio.play();
}

