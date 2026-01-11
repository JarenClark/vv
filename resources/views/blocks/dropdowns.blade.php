{{--   
  Title: VV - Dropdowns
  Description: Two column layout with an image on one side and content on the other
  Category: custom
  Icon: image-flip-vertical
  Keywords: content image columns two support contact
  Mode: auto
  Align: center
  PostTypes: page
  SupportsAlign: center
--}}
@php($rand = substr(md5(rand()), 0, 7))
<section class="py-20 ">
    <div class="container">
        <div class="">
            <div class=" max-w-2xl mx-auto mb-8">
                <h2 class="text-center">@field('heading')</h2>
                <p class="mt-8 text-2xl text-center">@field('intro_text')</p>
            </div>
            <div>
                @hasfields('dropdowns')
                    @php($idx = 0)
                    <ul class="space-y-4 accordion max-w-4xl mx-auto rand-{!! $rand !!}">
                        @fields('dropdowns')
                            <li class="accordion-item shadow-xl pb-4 lg:pb-8 bg-white {!! $idx == 0 ? 'active' : null !!}">
                                <div class="px-4 lg:px-8 pt-4 lg:pt-8">
                                    <div class="flex justify-between">
                                        <h3 class="text-blue-dark">@sub('label')</h3>
                                        @include('icons.chevron-down')
                                    </div>
                                </div>
                                <div class="content overflow-hidden "style="{!! $idx != 0 ? ' max-height:0;height: 0;' : null !!}">
                                    <div class="px-4 py-4 lg:px-8 lg:text-xl">
                                        @sub('paragraph')
                                    </div>
                                </div>
                            </li>
                            @php($idx++)
                        @endfields
                    </ul>
                @endhasfields
            </div>
        </div>

    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let accordion{!! $rand !!}Items = document.querySelectorAll(
            ".accordion.rand-{!! $rand !!} .accordion-item");

        accordion{!! $rand !!}Items.forEach((item, i) => {
            item.addEventListener("click", function() {
                accordion{!! $rand !!}Items.forEach((el, j) => {
                    const content = el.querySelector('.content');
                    const chevron = el.querySelector('svg');
                    if (i !== j) {
                        el.classList.remove("active");
                        content.style.height = 0;
                        content.style.maxHeight = 0;
                        chevron.style.transform = "rotate(0deg)";
                    } else {
                        el.classList.add("active");
                        content.style.height = content.scrollHeight + "px";
                        content.style.maxHeight = content.scrollHeight + "px";
                        chevron.style.transform = "rotate(180deg)";
                    }
                });
                // this.classList.toggle("active");
                // var panel = item.querySelector('.content');
                // if (panel.style.maxHeight) {
                //     panel.style.height = 0
                //     panel.style.maxHeight = null;
                // } else {
                //     panel.style.height = panel.scrollHeight + "px";
                //     panel.style.maxHeight = panel.scrollHeight + "px";
                // }
            });
        });

    });
</script>
<style>
    .accordion-item svg {
        transition: all 0.3s ease !important;
    }
    .accordion-item.active svg {
        transform: rotate(180deg);
    }
    .accordion-item.active .content {
        transition: all 0.3s ease !important;
    }
    .accordion-item .content ul {
        list-style: disc;
        padding: 0px 20px;
    }
</style>
