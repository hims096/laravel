@extends('layout.master')

@section('about')
    <div class="container my-2">

        <div class="row contanier">
            <center>
                <h4>About US</h4>
            </center>
            <div class="container col-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci impedit commodi minus animi, officiis
                ullam
                enim cumque, fuga autem recusandae eius! Voluptatibus, eveniet excepturi officia quod fuga accusantium
                facere
                vitae?
                <hr>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus natus, maxime iusto praesentium magni
                nulla
                soluta pariatur quibusdam nesciunt enim repudiandae aut aliquid expedita eaque eligendi? Reprehenderit
                perferendis perspiciatis qui laboriosam et quia expedita nisi hic veritatis ducimus, labore voluptate
                maiores
                repellendus. Odit voluptatibus voluptas in dignissimos soluta alias laudantium.
                <hr>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, possimus eos pariatur animi dolorem
                ipsam
                autem?
                Voluptates, ipsam ducimus minima eaque deleniti minus non a eligendi, mollitia officiis, nihil eveniet
                sapiente
                reiciendis sed. Sequi doloribus animi natus neque suscipit quisquam ad! Soluta animi ut magni fuga harum
                incidunt facere praesentium voluptatibus culpa quos mollitia aspernatur, amet vitae, dolorum asperiores
                ullam,
                eum ex voluptatem natus nisi. Quo quisquam harum quos sequi at ullam, quasi explicabo cumque assumenda
                asperiores atque voluptatum dignissimos.
                <hr>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, obcaecati beatae, molestiae
                corrupti
                iure
                id tempora sunt impedit eaque consequatur esse vero odit. Officia nisi necessitatibus ipsum, itaque, eum
                quidem,
                suscipit facere esse hic dicta adipisci. Ab eligendi ipsam iure.
            </div>
            <div class="container col-5">

                <center>
                    <h3>Address</h3>
                </center>
                <div>
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=University of Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            <a
                                    href="https://connectionsgame.org/">Connections Game</a></div>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                width: 600px;
                                height: 400px;
                            }

                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                width: 600px;
                                height: 400px;
                            }

                            .gmap_iframe {
                                width: 600px !important;
                                height: 400px !important;
                            }
                        </style>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
