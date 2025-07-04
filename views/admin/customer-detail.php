<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <li class="breadcrumb-item">
                                    <a href="<?= URL_ADMIN ?>danh-sach-tai-khoan">Danh sách tài khoản</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= $get_customer['username'] ?>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="h3 m-0">
                            <?= $get_customer['full_name'] ?>
                        </h1>
                    </div>
                    <div class="col-auto d-flex">
                        <a href="<?= URL_ADMIN ?>danh-sach-tai-khoan" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div>
            </div>
            <div class="sa-entity-layout"
                data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;}">
                <div class="sa-entity-layout__body">
                    <div class="sa-entity-layout__sidebar">
                        <div class="card">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div class="pt-3">
                                    <img class="rounded-circle" width="96" height="96" src="<?= DEFAULT_AVATAR ?>" alt=""/>
                                </div>
                                <div class="text-center mt-4">
                                    <div class="fs-exact-16 fw-medium">
                                        <?= $get_customer['full_name'] ?>
                                    </div>
                                    <div class="fs-exact-13 text-muted">
                                        <div class="mt-1">
                                            <a href="<?= URL_ADMIN ?>gui-email?u=<?= $get_customer['username'] ?>" title="Nhấn vào để gửi email đến người này">
                                                <?= $get_customer['email'] ?>
                                            </a>
                                        </div>
                                        <div class="mt-1">+38 (094) 730-24-25</div>
                                    </div>
                                </div>
                                <div class="sa-divider my-5"></div>
                                <div class="w-100">
                                    <dl class="list-unstyled m-0">
                                        <dt class="fs-exact-14 fw-medium">Last Order</dt>
                                        <dd class="fs-exact-13 text-muted mb-0 mt-1">7 days ago – <a
                                                href="app-order.html">#80294</a></dd>
                                    </dl>
                                    <dl class="list-unstyled m-0 mt-4">
                                        <dt class="fs-exact-14 fw-medium">Average Order Value</dt>
                                        <dd class="fs-exact-13 text-muted mb-0 mt-1">$574.00</dd>
                                    </dl>
                                    <dl class="list-unstyled m-0 mt-4">
                                        <dt class="fs-exact-14 fw-medium">Registered</dt>
                                        <dd class="fs-exact-13 text-muted mb-0 mt-1">2 months ago</dd>
                                    </dl>
                                    <dl class="list-unstyled m-0 mt-4">
                                        <dt class="fs-exact-14 fw-medium">Email Marketing</dt>
                                        <dd class="fs-exact-13 text-muted mb-0 mt-1">Subscribed</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sa-entity-layout__main">
                        <div class="sa-card-area"><textarea class="sa-card-area__area" rows="2"
                                placeholder="Notes about customer"></textarea>
                            <div class="sa-card-area__card"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="1em" height="1em" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-edit">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                    </path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                    </path>
                                </svg></div>
                        </div>
                        <div class="card mt-5">
                            <div
                                class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                <h2 class="mb-0 fs-exact-18 me-4">Orders</h2>
                                <div class="text-muted fs-exact-14 text-end">Total spent $34,980.34 on 7
                                    orders</div>
                            </div>
                            <div class="table-responsive">
                                <table class="sa-table text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td><a href="app-order.html">#80294</a></td>
                                            <td>Today at 6:10 pm</td>
                                            <td>Pending</td>
                                            <td>4 items</td>
                                            <td>$320.00</td>
                                        </tr>
                                        <tr>
                                            <td><a href="app-order.html">#63736</a></td>
                                            <td>May 15, 2019</td>
                                            <td>Completed</td>
                                            <td>7 items</td>
                                            <td>$2,574.31</td>
                                        </tr>
                                        <tr>
                                            <td><a href="app-order.html">#63501</a></td>
                                            <td>January 7, 2019</td>
                                            <td>Completed</td>
                                            <td>1 items</td>
                                            <td>$34.00</td>
                                        </tr>
                                        <tr>
                                            <td><a href="app-order.html">#40278</a></td>
                                            <td>October 19, 2018</td>
                                            <td>Completed</td>
                                            <td>2 items</td>
                                            <td>$704.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="sa-divider"></div>
                            <div class="px-5 py-4 text-center"><a href="app-orders-list.html">View all 7
                                    orders</a></div>
                        </div>
                        <div class="card mt-5">
                            <div
                                class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                <h2 class="mb-0 fs-exact-18 me-4">Addresses</h2>
                                <div class="text-muted fs-exact-14"><a href="#">New address</a></div>
                            </div>
                            <div class="sa-divider"></div>
                            <div class="px-5 py-3 my-2 d-flex align-items-center justify-content-between">
                                <div>
                                    <div>Jessica Moore</div>
                                    <div class="text-muted fs-exact-14 mt-1">Random Federation 115302,
                                        Moscow ul. Varshavskaya, 15-2-178</div>
                                </div>
                                <div>
                                    <div class="dropdown"><button class="btn btn-sa-muted btn-sm"
                                            type="button" id="address-context-menu-0"
                                            data-bs-toggle="dropdown" aria-expanded="false"
                                            aria-label="More"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="3" height="13" fill="currentColor">
                                                <path
                                                    d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                </path>
                                            </svg></button>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="address-context-menu-0">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#">Add tag</a></li>
                                            <li><a class="dropdown-item" href="#">Remove tag</a></li>
                                            <li>
                                                <hr class="dropdown-divider" />
                                            </li>
                                            <li><a class="dropdown-item text-danger" href="#">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sa-divider"></div>
                            <div class="px-5 py-3 my-2 d-flex align-items-center justify-content-between">
                                <div>
                                    <div>Neptune Saturnov</div>
                                    <div class="text-muted fs-exact-14 mt-1">Earth 4b4f53, MarsGrad Sun
                                        Orbit, 43.3241-85.239</div>
                                </div>
                                <div>
                                    <div class="dropdown"><button class="btn btn-sa-muted btn-sm"
                                            type="button" id="address-context-menu-1"
                                            data-bs-toggle="dropdown" aria-expanded="false"
                                            aria-label="More"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="3" height="13" fill="currentColor">
                                                <path
                                                    d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                </path>
                                            </svg></button>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="address-context-menu-1">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Duplicate</a></li>
                                            <li><a class="dropdown-item" href="#">Add tag</a></li>
                                            <li><a class="dropdown-item" href="#">Remove tag</a></li>
                                            <li>
                                                <hr class="dropdown-divider" />
                                            </li>
                                            <li><a class="dropdown-item text-danger" href="#">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div