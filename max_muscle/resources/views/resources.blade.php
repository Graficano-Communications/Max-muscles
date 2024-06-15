@extends('layouts.master')
@section('title', 'Catalogues')
@section('content')
    <!-- contact area start -->
    <div class="contact__area" style="padding: 90px;background-image:url('{{ asset('assets/img/catalogue/Catalogue-banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="contact__content text-center ">
                        <h2 class="text-white">Catalogues</h2>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <!-- contact area end -->
    <div class="single_product_long_desc pt-50">
		<div class="container">
			<div class="row">
				<div class="col-xl 12 col-lg-12 col-md-12">
					<div class="row text-center">
                        @foreach($resources as $key => $catalog)
						<div class="col xl-3 col-lg-3 col-md-3 col-sm-12">
							<a href="#">
								<div class="show_model_product mb-30">
									
									<img src="{{ asset('assets/img/catalogue/' . $catalog->image) }}" alt="">
                                    <h4 class="pb-30">{{ $catalog->name }}</h4>
                                    <form action="{{ route('downloadcatlog') }}" method="post" style="padding-top:20px;">
                                        <input placeholder="Enter Password..." class="form-control " type="password" name="password"
                                            required="" style="margin-bottom: 20px;border: none;">
                                        <input type="hidden" name="id" value="{{ $catalog->id }}">
                                        @csrf
                                        <button type="submit"
                                            class="btn-style-1"><i class="fa fa-download"></i> Download Now</button>
                                    </form>

								</div>
							</a>
						</div>
                        @endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
