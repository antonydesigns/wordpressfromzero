jQuery().ready(($) => {
  loadMoreBtn = $("#load-more");
  // totalPagesCount = $("#post-pagination").data("max-pages");

  /**
   * Load more posts.
   *
   * 1.Make an ajax request, by incrementing the page no. by one on each request.
   * 2.Append new/more posts to the existing content.
   * 3.If the response is 0 ( which means no more posts available ), remove the load-more button from DOM.
   * Once the load-more button gets removed, the IntersectionObserverAPI callback will not be triggered, which means
   * there will be no further ajax request since there won't be any more posts available.
   */
  const handleLoadMoreBtnClick = () => {
    //if (!loadMoreBtn.length) {
    //  return;
    //}

    let page = loadMoreBtn.data("page");
    let nextPage = page + 1; // Increment page count by one.

    /* function removeLoadMoreIfOnLastPage(nextPage) {
        if (nextPage + 1 > totalPagesCount) {
          loadMoreBtn.empty();
        }
      } */

    $.ajax({
      url: ajax.ajaxurl,
      //type: "post",
      data: {
        page: page,
        action: "loadmore2",
      },
      success: (response) => {
        loadMoreBtn.data("page", nextPage);
        $("#load-more-content").prepend(response);
        //  removeLoadMoreIfOnLastPage(nextPage);
      },
      error: (response) => {
        console.log(response);
      },
    });
  };

  loadMoreBtn.click(handleLoadMoreBtnClick);
}); // close jQuery
