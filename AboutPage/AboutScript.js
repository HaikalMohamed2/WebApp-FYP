// Custom JavaScript for animated scrolling

window.addEventListener('scroll', function() 
{
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
    if (isElementInViewport(section)) 
    {
        section.classList.add('animated');
    } 
    else 
    {
        section.classList.remove('animated');
    }
    });
});

function isElementInViewport(el) 
{
    var rect = el.getBoundingClientRect();
    return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}