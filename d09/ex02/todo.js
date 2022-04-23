var ft_list;
var cookie = [];

window.addEventListener("load", (event)=>{
    document.querySelector("#new").addEventListener("click", newTask);
    ft_list = document.querySelector("#ft_list");
    var temp = document.cookie;
    if (temp)
    {
        cookie = JSON.parse(temp);
        cookie.forEach(function (task)
        {
            addTask(task);
        });
    }
});

window.addEventListener("unload", (event)=>{
    var task = ft_list.children;
    var newCookie = [];
    for (var i = 0; i < task.length; i++)
    newCookie.unshift(task[i].innerHTML);
    document.cookie = JSON.stringify(newCookie);
});

function addTask(task){
    var div = document.createElement("div");
    div.innerHTML = task;
    div.addEventListener("click", deleteTask);
    ft_list.insertBefore(div, ft_list.firstChild);
}

function newTask(){
    var task = prompt("Keep it comin'!", '');
    if (task)
        addTask(task);
}

function deleteTask(){
    if(confirm("Are you like SUPER sure about this important decision?!!?!?!?!"))
    {
        this.parentElement.removeChild(this);
    }
}
