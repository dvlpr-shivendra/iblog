require('./bootstrap');
require('./bulma');
require('./clipboard');


// Search start
document.querySelector("#search").addEventListener("input", event => {
    const query = event.target.value;
    const searchResults = document.querySelector("#search-results");

    if(!query.length) {
        searchResults.innerHTML = "";
        return false;
    };

    axios.post('/search/post', {
        'title': query,
    }).then(response => {

        searchResults.innerHTML = "";
        
        const posts = response.data;

        if (!posts.length) {
            const notFound = document.createElement("p");
            notFound.classList.add("panel-block");
            notFound.innerText = "No such post found"
            return searchResults.appendChild(notFound);
        }

        posts.forEach(post => {
            const postItem = document.createElement("a");
            postItem.classList.add("panel-block");
            postItem.innerText = post.title
            postItem.href = `/posts/${post.slug}`;
            searchResults.appendChild(postItem);
        });
    })
});
// Search End