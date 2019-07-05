<section id="list-buku" class=" bg-white py-4 font-sans">
    <div class="container max-w-xl m-auto flex flex-wrap items-center justify-start">
        <?php 
            foreach ($bukubuku as $key => $value):
                $default_image = base_url()."assets/default-image.jpg";
                $image = $value->image;
                if(empty($image)) {
                    $image = $default_image;
                }
        ?>
            <div class="card w-full md:w-1/2 lg:w-1/3 flex flex-col mb-8 px-3" style="position:relative">
                <div
                    class="tools"
                    style="
                        display:none;
                        position: absolute;
                        top: 0;
                        right: 10px;
                        text-align: right;
                        padding:5px;
                    "
                >
                    <a 

                        data-id='<?php echo $value->ID; ?>' 
                        data-judul='<?php echo $value->Judul_Buku; ?>'
                        data-pengarang='<?php echo $value->Pengarang; ?>' 
                        data-isbn='<?php echo $value->ISBN; ?>' 
                        data-jumlah_halaman='<?php echo $value->Jumlah_Halaman; ?>' 
                        data-tanggal_terbit='<?php echo $value->Tanggal_Terbit; ?>' 
                        data-harga='<?php echo $value->Harga; ?>' 
                        data-edisi='<?php echo $value->Edisi; ?>' 
                        data-image='<?php echo $image; ?>'
                        
                        class="upload-image-buku" href="#">
                        <img 
                            src=<?php echo base_url()."assets/icons/icons8-synchronize-50.svg"; ?> 
                            style="width:15%;padding-right: 5px;opacity:.5;"
                        />
                    </a>
                    <a 

                        data-id='<?php echo $value->ID; ?>' 
                        data-judul='<?php echo $value->Judul_Buku; ?>'
                        data-pengarang='<?php echo $value->Pengarang; ?>' 
                        data-isbn='<?php echo $value->ISBN; ?>' 
                        data-jumlah_halaman='<?php echo $value->Jumlah_Halaman; ?>' 
                        data-tanggal_terbit='<?php echo $value->Tanggal_Terbit; ?>' 
                        data-harga='<?php echo $value->Harga; ?>' 
                        data-edisi='<?php echo $value->Edisi; ?>' 
                        data-image='<?php echo $image; ?>'

                        class="edit" href="#">
                        <img 
                            src=<?php echo base_url()."assets/icons/icons8-edit-50.svg"; ?> 
                            style="width:18%;padding-right: 5px;opacity:.5;"
                        />
                    </a>
                    <a 
                        data-id='<?php echo $value->ID; ?>' 
                        data-judul='<?php echo $value->Judul_Buku; ?>'
                        data-pengarang='<?php echo $value->Pengarang; ?>' 
                        data-isbn='<?php echo $value->ISBN; ?>' 
                        data-jumlah_halaman='<?php echo $value->Jumlah_Halaman; ?>' 
                        data-tanggal_terbit='<?php echo $value->Tanggal_Terbit; ?>' 
                        data-harga='<?php echo $value->Harga; ?>' 
                        data-edisi='<?php echo $value->Edisi; ?>' 
                        data-image='<?php echo $image; ?>'
                        
                        class="delete" href="#">
                        <img 
                            src=<?php echo base_url()."assets/icons/icons8-trash-50.svg"; ?> 
                            style="width:18%;padding-right: 5px;opacity:.5;"
                        />
                    </a>
                </div>
                <div
                    class="overflow-hidden bg-white rounded-lg shadow hover:shadow-raised hover:translateY-2px transition">
                    <img class="w-full" src="<?php echo $image; ?> "
                        alt="Sunset in the mountains">
                    <div class="p-6 flex flex-col justify-between ">
                        <h3 class="font-medium text-grey-darkest mb-4 leading-normal">
                            <?php 
                                echo $value->Judul_Buku; 
                            ?>
                        </h3>
                        <h5 class="font-medium text-grey-darkest mb-2 leading-normal">
                            by <?php 
                                echo $value->Pengarang; 
                            ?>
                        </h5>
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