<section class="bg--dark">
    <div class="container">
        <div class="row justify-content-center">
            <h2>Our Installers</h2>
            <div class="col-md-12 col-12 mb-5">
                <div class="map-container border--round"
                     data-maps-api-key="AIzaSyBUFJONPML4woNBEInCsiHqhGkZ4rozUaA"
                     @foreach ($installers as $installer)
                     data-address="[
                         Australia [nomarker];
                            {{ $installer->fullAddress }};
                         ]"
                     data-marker-title="{{ $installer->name }}"
                     @endforeach
                     data-map-zoom="4"
                     data-map-style="@include('layouts.frontPartials.mapStyle')">
                </div>
            </div>
        </div>

        @foreach ($nswInstallers as $installer)
            <h3>New South Wales</h3>
            <div class="row mb--1">
                <div class="rounded col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-0 text-black-50">
                                {{ $installer->name }}
                            </h4>
                            <hr>
                            <p class="my-0">
                                <i class="icon icon-Map2 icon--sm text-red-800"></i>
                                <a target="_blank"
                                   href="http://maps.google.com/?q={{ $installer->fullAddress }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->fullAddress }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Phone icon--sm text-red-800"></i>
                                <a href="tel:{{ $installer->phone }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->phone }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Email icon--sm text-red-800"></i>
                                <a href="mailto:{{ $installer->email }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->email }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($qldInstallers as $installer)
            <h3>Queensland</h3>
            <div class="row mb--1">
                <div class="rounded col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-0 text-black-50">
                                {{ $installer->name }}
                            </h4>
                            <hr>
                            <p class="my-0">
                                <i class="icon icon-Map2 icon--sm text-red-800"></i>
                                <a target="_blank"
                                   href="http://maps.google.com/?q={{ $installer->fullAddress }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->fullAddress }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Phone icon--sm text-red-800"></i>
                                <a href="tel:{{ $installer->phone }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->phone }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Email icon--sm text-red-800"></i>
                                <a href="mailto:{{ $installer->email }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->email }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($vicInstallers as $installer)
            <h3>Victoria</h3>
            <div class="row mb--1">
                <div class="rounded col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-0 text-black-50">
                                {{ $installer->name }}
                            </h4>
                            <hr>
                            <p class="my-0">
                                <i class="icon icon-Map2 icon--sm text-red-800"></i>
                                <a target="_blank"
                                   href="http://maps.google.com/?q={{ $installer->fullAddress }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->fullAddress }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Phone icon--sm text-red-800"></i>
                                <a href="tel:{{ $installer->phone }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->phone }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Email icon--sm text-red-800"></i>
                                <a href="mailto:{{ $installer->email }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->email }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($tasInstallers as $installer)
            <h3>Tasmania</h3>
            <div class="row mb--1">
                <div class="rounded col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-0 text-black-50">
                                {{ $installer->name }}
                            </h4>
                            <hr>
                            <p class="my-0">
                                <i class="icon icon-Map2 icon--sm text-red-800"></i>
                                <a target="_blank"
                                   href="http://maps.google.com/?q={{ $installer->fullAddress }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->fullAddress }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Phone icon--sm text-red-800"></i>
                                <a href="tel:{{ $installer->phone }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->phone }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Email icon--sm text-red-800"></i>
                                <a href="mailto:{{ $installer->email }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->email }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($actInstallers as $installer)
            <h3>A.C.T.</h3>
            <div class="row mb--1">
                <div class="rounded col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-0 text-black-50">
                                {{ $installer->name }}
                            </h4>
                            <hr>
                            <p class="my-0">
                                <i class="icon icon-Map2 icon--sm text-red-800"></i>
                                <a target="_blank"
                                   href="http://maps.google.com/?q={{ $installer->fullAddress }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->fullAddress }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Phone icon--sm text-red-800"></i>
                                <a href="tel:{{ $installer->phone }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->phone }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Email icon--sm text-red-800"></i>
                                <a href="mailto:{{ $installer->email }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->email }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($ntInstallers as $installer)
            <h3>Northern Territory</h3>
            <div class="row mb--1">
                <div class="rounded col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-0 text-black-50">
                                {{ $installer->name }}
                            </h4>
                            <hr>
                            <p class="my-0">
                                <i class="icon icon-Map2 icon--sm text-red-800"></i>
                                <a target="_blank"
                                   href="http://maps.google.com/?q={{ $installer->fullAddress }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->fullAddress }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Phone icon--sm text-red-800"></i>
                                <a href="tel:{{ $installer->phone }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->phone }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Email icon--sm text-red-800"></i>
                                <a href="mailto:{{ $installer->email }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->email }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($saInstallers as $installer)
            <h3>South Australia</h3>
            <div class="row mb--1">
                <div class="rounded col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-0 text-black-50">
                                {{ $installer->name }}
                            </h4>
                            <hr>
                            <p class="my-0">
                                <i class="icon icon-Map2 icon--sm text-red-800"></i>
                                <a target="_blank"
                                   href="http://maps.google.com/?q={{ $installer->fullAddress }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->fullAddress }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Phone icon--sm text-red-800"></i>
                                <a href="tel:{{ $installer->phone }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->phone }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Email icon--sm text-red-800"></i>
                                <a href="mailto:{{ $installer->email }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->email }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($waInstallers as $installer)
            <h3>Western Australia</h3>
            <div class="row mb--1">
                <div class="rounded col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="my-0 text-black-50">
                                {{ $installer->name }}
                            </h4>
                            <hr>
                            <p class="my-0">
                                <i class="icon icon-Map2 icon--sm text-red-800"></i>
                                <a target="_blank"
                                   href="http://maps.google.com/?q={{ $installer->fullAddress }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->fullAddress }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Phone icon--sm text-red-800"></i>
                                <a href="tel:{{ $installer->phone }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->phone }}</a>
                            </p>
                            <p class="my-0">
                                <i class="icon icon-Email icon--sm text-red-800"></i>
                                <a href="mailto:{{ $installer->email }}"
                                   class="text-black-50 type--bold pr-bottom-10">{{ $installer->email }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
