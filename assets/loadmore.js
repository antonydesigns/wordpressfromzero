jQuery().ready(($) => {
  loadMoreBtn = $("#load-more");
  totalPagesCount = loadMoreBtn.data("max-pages");
  console.log("total page: " + totalPagesCount);

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
    if (!loadMoreBtn.length) {
      return;
    }

    let page = loadMoreBtn.data("page");

    $.ajax({
      url: ajax.ajaxurl,
      type: "post",
      data: {
        page: page,
        action: "loadmore",
      },
      success: (response) => {
        loadMoreBtn.data("page", page + 1);
        $("#load-more-content").append(response);
        console.log("this page: " + page);
        console.log("total page: " + totalPagesCount);
        removeLoadMoreOnLastPage(page);
      },
      error: (response) => {
        console.log(response);
      },
    });
  };

  const removeLoadMoreOnLastPage = (page) => {
    if (page + 2 > totalPagesCount) {
      loadMoreBtn.remove();
      console.log("this page: " + page);
    }
  };

  loadMoreBtn.click(handleLoadMoreBtnClick);
}); // close jQuery
