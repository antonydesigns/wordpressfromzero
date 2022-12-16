jQuery().ready(($) => {
  loadMoreBtn = $("#load-more");
  loadingTextEl = $("#loading-text");
  isRequestProcessing = false;

  options = {
    root: null,
    rootMargin: "0px",
    threshold: 1.0, // 1.0 means set isIntersecting to true when element comes in 100% view.
  };

  if (!loadMoreBtn.length) {
    return;
  }

  totalPagesCount = $("#post-pagination").data("max-pages");

  /**
   * Add the IntersectionObserver api, and listen to the load more intersection status.
   * so that intersectionObserverCallback gets called if the element intersection status changes.
   *
   * @type {IntersectionObserver}
   */
  const observer = new IntersectionObserver(
    (entries) => intersectionObserverCallback(entries),
    options
  );
  observer.observe(loadMoreBtn[0]);

  /**
   * Gets called on initial render with status 'isIntersecting' as false and then
   * everytime element intersection status changes.
   *
   * @param {array} entries No of elements under observation.
   *
   */
  function intersectionObserverCallback(entries) {}
  {
    // array of observing elements
    // The logic is apply for each entry ( in this case it's just one loadmore button )
  }

  /**
   * Load more posts.
   *
   * 1.Make an ajax request, by incrementing the page no. by one on each request.
   * 2.Append new/more posts to the existing content.
   * 3.If the response is 0 ( which means no more posts available ), remove the load-more button from DOM.
   * Once the load-more button gets removed, the IntersectionObserverAPI callback will not be triggered, which means
   * there will be no further ajax request since there won't be any more posts available.
   *
   * @return null
   */

  // Get page no from data attribute of load-more button.
  const page = loadMoreBtn.data("page");
  if (!page || isRequestProcessing) {
    return null;
  }

  const nextPage = parseInt(page) + 1; // Increment page count by one.
  isRequestProcessing = true;

  $.ajax({
    url: ajax.ajaxurl,
    type: "post",
    data: {
      page: page,
      action: "load_more",
    },
    success: (response) => {
      loadMoreBtn.data("page", nextPage);
      $("#load-more-content").append(response);
      removeLoadMoreIfOnLastPage(nextPage);
      isRequestProcessing = false;
    },
    error: (response) => {
      console.log(response);
      isRequestProcessing = false;
    },
  });

  /**
   * Remove Load more Button If on last page.
   *
   * @param {int} nextPage New Page.
   */
  function removeLoadMoreIfOnLastPage(nextPage) {
    if (nextPage + 1 > totalPagesCount) {
      loadMoreBtn.remove();
    }
  }
});
