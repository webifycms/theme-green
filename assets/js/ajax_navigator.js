const NETWORK_ERROR_MSG = 'Network error occurred'

/**
 * Applies AJAX-based navigation to prevent full page reload, like pjax.
 * 
 * @param contentSelector HTML selector of the content tag where it's child will be replaced
 * @param linkSelector HTML selectors of the links that should support AJAX navigation
 */
export function ajax_navigator(contentSelector, linkSelector) {
    const contentArea = document.querySelector(contentSelector)
    const links = document.querySelectorAll(linkSelector)

    if (!contentArea || links.length === 0) {
        return;
    }

    function loadPage(event, link) {
        event.preventDefault()
        const pageUrl = link.getAttribute('href')

        fetch(pageUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error(NETWORK_ERROR_MSG)
                }

                return response.text()
            })
            .then(html => {
                contentArea.innerHTML = html
                window.history.pushState({ path: pageUrl }, '', pageUrl)
            })
            .catch(window.location.href = pageUrl) // Fallback to full page load
    }

    function handlePopState(event) {
        if (event.state && event.state.path) {
            fetch(event.state.path)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(NETWORK_ERROR_MSG)
                    }
                    return response.text();
                })
                .then(html => {
                    contentArea.innerHTML = html
                })
                .catch(window.location.href = event.state.path) // Fallback to full page load
        }
    }

    links.forEach(link => {
        link.addEventListener('click', (e) => loadPage(e, link))
    })

    window.addEventListener('popstate', handlePopState)
}