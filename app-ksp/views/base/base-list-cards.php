<section id="list-buku" class=" bg-white py-4 font-sans">
    <div class="container max-w-xl m-auto flex flex-wrap items-center justify-start">
        <?php 
            foreach ($bukubuku as $key => $value):
        ?>
            <div class="w-full md:w-1/2 lg:w-1/3 flex flex-col mb-8 px-3">
                <div
                    class="overflow-hidden bg-white rounded-lg shadow hover:shadow-raised hover:translateY-2px transition">
                    <!-- <img class="w-full" src="https://stitches.hyperyolo.com/images/demo-bg.png"
                        alt="Sunset in the mountains"> -->
                    <div class="p-6 flex flex-col justify-between ">
                        <h3 class="font-medium text-grey-darkest mb-4 leading-normal">
                            <?php 
                                echo $value->Judul_Buku; 
                            ?>
                        </h3>
                        <p class="inline-flex items-center">
                            <span class="text-grey-dark text-sm">Read More</span>
                        </p>
                    </div>
                </div>
            </div>

        <?php 
            endforeach;
        ?>
    </div>
</section>