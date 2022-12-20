jQuery().ready(($) => {
  class Loadmore {
    constructor() {
      this.ajaxurl = ajax.ajaxurl;
      this.ajaxnonce = ajax.ajaxnonce;
      this.loadMoreBtn = $("#load-more");
      this.totalPagesCount = this.loadMoreBtn.data("max-pages");

      this.loadMoreBtn.click(() => {
        this.handleLoadMoreBtnClick();
      });

      if (!this.loadMoreBtn.length) {
        return;
      }
    }

    handleLoadMoreBtnClick() {
      let page = this.loadMoreBtn.data("page");
      $.ajax({
        url: this.ajaxurl,
        type: "post",
        data: {
          page: page,
          action: "loadmore",
          ajaxnonce: this.ajaxnonce,
        },
        success: (response) => {
          console.log(page);
          this.loadMoreBtn.data("page", page + 1);
          $("#load-more-content").append(response);
          console.log("this page: " + page);
          console.log("total page: " + this.totalPagesCount);
          this.removeLoadMoreOnLastPage(page);
        },
        error: (response) => {
          console.log(response);
        },
      });
    }

    removeLoadMoreOnLastPage = (page) => {
      if (page + 2 > this.totalPagesCount) {
        this.loadMoreBtn.remove();
      }
    };
  }

  const loadmore = new Loadmore();
}); // close jQuery
