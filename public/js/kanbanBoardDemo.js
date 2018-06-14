var KanbanTest = new jKanban({
      element : '#myKanban',
      gutter  : '10px',
      widthBoard : '450px',
      click : function(el){
          console.log(el);
      },
      boards  :[
          {
              "id" : "_todo",
              "title"  : "To Do",
              "class" : "info",
              "item"  : [
                  {
                      "id":"_test_delete",
                      "title":"My Task Test"

                  },
                  {
                      "title":"Buy Milk",
                  }
              ]
          },
          {
              "id" : "_working",
              "title"  : "Working",
              "class" : "warning",
              "item"  : [
                  {
                      "title":"Do Something!",
                  },
                  {
                      "title":"Run?",
                  }
              ]
          },
          {
              "id" : "_done",
              "title"  : "Done",
              "class" : "success",
              "item"  : [
                  {
                      "title":"All right",
                  },
                  {
                      "title":"Ok!",
                  }
              ]
          }
      ]
  });

  var toDoButton = document.getElementById('addToDo');
  if(toDoButton){
    toDoButton.addEventListener('click',function(){
        KanbanTest.addElement(
            "_todo",
            {
                "title":"Test Add",
            }
        );
    });
  }


  var addBoardDefault = document.getElementById('addDefault');
  if(addBoardDefault){
    addBoardDefault.addEventListener('click', function () {
        KanbanTest.addBoards(
            [{
                "id" : "_default",
                "title"  : "Kanban Default",
                "item"  : [
                    {
                        "title":"Default Item",
                    },
                    {
                        "title":"Default Item 2",
                    },
                    {
                        "title":"Default Item 3",
                    }
                ]
            }]
        )
    });
  }
  var removeBoard = document.getElementById('removeBoard');
  if(removeBoard){
    removeBoard.addEventListener('click',function(){
        KanbanTest.removeBoard('_done');
    });
  }


  var removeElement = document.getElementById('removeElement');
  if(removeElement){
    removeElement.addEventListener('click',function(){
        KanbanTest.removeElement('_test_delete');
    });
  }


  var allEle = KanbanTest.getBoardElements('_todo');
  allEle.forEach(function(item, index){
      console.log(item);
  })
