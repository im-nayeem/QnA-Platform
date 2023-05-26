/**
 * Make left-sidebar responsive for small screen
 */
//add eventlistener on sidenav-btn so that it toggles left-sidebar on button click
document.getElementById('sidenav-btn').addEventListener("click",toggleSidebar);
/**
 * toogleSidebar function to toggle the left-sidebar on sidenav-btn click
 */
function toggleSidebar() 
{
    const sidebar = document.getElementById('left-sidebar');
    if(sidebar.style.display === 'block') 
        sidebar.style.display = 'none';
    else
        sidebar.style.display = 'block';
    
    const btn = document.getElementById('sidenav-close-btn');
    if(btn.style.display === 'block') 
        btn.style.display = 'none';
    else
        btn.style.display = 'block';

}