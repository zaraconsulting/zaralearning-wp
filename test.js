<div>
    <h3>Cart</h3>
    <hr />

    <div className="card shopping-cart">
        <div className="card-header bg-dark text-light">
            <i className="fa fa-shopping-cart" aria-hidden="true"></i>
            Shopping Cart
            <a href="" className="btn btn-outline-info btn-sm pull-right">Continue Shopping</a>
            <div className="clearfix"></div>
        </div>
        <div className="card-body">

            {/* <!-- PRODUCTS --> */}
            <div className="row">
                <div className="col-12 col-sm-12 col-md-2 text-center">
                    <img className="img-responsive" src={} alt={} width="120" height="80" />
                </div>
                <div className="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                    <h4 className="product-name"><strong>{}</strong></h4>
                    <h4>
                        <small>{}</small>
                    </h4>
                </div>
                <div className="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                    <div className="col-3 col-sm-3 col-md-6 text-md-right" style={{ paddingTop: "5px" }}>
                        <h6><strong>${} <span className="text-muted">x</span></strong></h6>
                    </div>
                    <div className="col-4 col-sm-4 col-md-4">
                        <div className="quantity">
                            <input type="number" step="1" max="99" min="1"  />
                        </div>
                    </div>
                    <div className="col-2 col-sm-2 col-md-2 text-right">
                        <button type="button" className="btn btn-outline-danger btn-xs">
                            <i className="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr />
            {/* <!-- END PRODUCTS --> */}

        </div>
        <div className="card-footer">
            <div className="text-right">
                <div className="cart-totals">
                    Subtotal: <b>${}</b>
                </div>
                <div className="cart-totals">
                    Tax: <b>${}</b>
                </div>
                <div className="cart-totals">
                    Grand total: <b>${}</b>
                </div>
            </div>
            <div className="pull-right" style={{ margin: "10px" }}>
                <form id="checkout-form" action="" method="POST">
                    <input type="submit" className="btn btn-success pull-right" value="Checkout" />
                </form>
            </div>
        </div>
    </div>
</div>