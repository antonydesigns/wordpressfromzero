jQuery().ready(($) => {
  class Loadmore {
    constructor() {
      this.ajaxurl = ajax.ajaxurl;
      this.ajaxnonce = ajax.ajaxnonce;
      this.loadMoreBtn = $("#load-more");
      this.totalPagesCount = this.loadMoreBtn.data("max-pages");
      this.options = {
        root: null,
        rootMargin: "0px",
        threshold: 1.0,
      };

      if (!this.loadMoreBtn.length) {
        return;
      } else {
        /* this.loadMoreBtn.click(() => {
          this.handleLoadMorePosts();
        }); */
        const observer = new IntersectionObserver((entries) => {
          this.intersectionObserverCallback(entries), this.options;
        });
        observer.observe(this.loadMoreBtn[0]);
      }
    }

    intersectionObserverCallback(entries) {
      entries.forEach((entry) => {
        if (entry?.isIntersecting) {
          this.handleLoadMorePosts();
        }
      });
    }

    handleLoadMorePosts() {
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
          this.loadMoreBtn.data("page", page + 1);
          $("#load-more-content").append(response);
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
