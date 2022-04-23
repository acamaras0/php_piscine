var ft_list;
var cookie = [];

$(document).ready(function(){
    $("#new").click(newTask);
    ft_list = $("#ft_list");
    $("#ft_list div").click(deleteTask);
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

$(window).on("unload", function(){
    var task = ft_list.children();
    var newCookie = [];
    for (var i = 0; i < task.length; i++)
        newCookie.unshift(task[i].innerHTML);
    document.cookie = JSON.stringify(newCookie);
});

function addTask(task){
    ft_list.prepend($('<div>'+ task + '</div>').click(deleteTask));
}

function newTask(){
    var task = prompt("Add your task to the stash!", '');
    if (task)
        addTask(task);
}

function deleteTask(){
    if(confirm("Are you like super sure about this important decision???"))
    {
        this.remove();
    }
}
