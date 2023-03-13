dnd(document.getElementById("items"));

function dnd(target) {
  if (target) {
    let items = target.querySelectorAll(".item"), current = null;

    if (items)
      for (let i of items) {
        // ATTACH DRAGGABLE
        i.draggable = true;

        // DRAG START - YELLOW HIGHLIGHT DROPZONES
        i.ondragstart = e => {
          current = i;
          for (let it of items) {
            if (it != current) { it.classList.add("hint"); }
          }
        };

        // DRAG ENTER - RED HIGHLIGHT DROPZONE
        i.ondragenter = e => {
          if (i != current) { i.classList.add("active"); }
        };

        // DRAG LEAVE - REMOVE RED HIGHLIGHT
        i.ondragleave = () => i.classList.remove("active");

        // DRAG END - REMOVE ALL HIGHLIGHTS
        i.ondragend = () => {
          for (let it of items) {
            it.classList.remove("hint");
            it.classList.remove("active");
          }
        };

        // DRAG OVER - PREVENT THE DEFAULT "DROP", SO WE CAN DO OUR OWN
        i.ondragover = e => e.preventDefault();

        // ON DROP - DO SOMETHING
        i.ondrop = e => {
          e.preventDefault();
          if (i != current) {
            let currentpos = 0, droppedpos = 0;
            for (let it = 0; it < items.length; it++) {
              if (current == items[it]) { currentpos = it; }
              if (i == items[it]) { droppedpos = it; }
            }
            if (currentpos < droppedpos) {
              i.parentNode.insertBefore(current, i.nextSibling);
            } else {
              i.parentNode.insertBefore(current, i);
            }
          }
        };
      }

  }
}