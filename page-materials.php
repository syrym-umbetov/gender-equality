<?php
get_header();
$materials = fond1_get_fields('materials-section');

// get unique categories
$unique_categories = array();
foreach ($materials as $material)
{
  $temp_custom_category = $material["custom_category"];
  $is_exists = false;
  foreach ($unique_categories as $unique_category)
    if ($unique_category["temp_custom_category"] == $temp_custom_category)
        $is_exists = true;
  
  if ($is_exists == false)
    {
      $myCat = [];
      $myCat["temp_custom_category"] = $temp_custom_category;
      $myCat["temp_custom_category_rus"] = $material["custom_category_rus"];
  
      $unique_categories[] = $myCat;
    }
}

//menu_icon
//var_dump( $unique_categories );
$terms = get_the_terms( $post->ID, 'taxonomies' );

?>
    <div id='root'></div>
    <script type='text/babel'>
       var category = <?php echo json_encode($unique_categories); ?>;
       var materials = <?php echo json_encode($materials); ?>;
      function App () {
        return(<Main />)
      }


      function List ({item, setFilteredMaterials, setCurrentPage, handleColor, active}) {
       
        const ref = React.useRef();

        const handleCategory = (obj) => {
          setFilteredMaterials(materials?.filter((item) => item?.custom_category_rus === ref.current?.innerText))
        }
        return (<li ref={ref} onClick={()=>{
                    setCurrentPage(1)
                    handleCategory(item)
                    handleColor(item?.temp_custom_category_rus)
                  }} 
                  className={`${active === item?.temp_custom_category_rus && "text-main"} my-4 cursor-pointer custom_category_li hover:text-main focus:text-black`}>
                    {item?.temp_custom_category_rus}
                </li>)
      }

      const usePagination = ({
        totalCount,
        pageSize,
        siblingCount = 1,
        currentPage
      }) => {
        const DOTS = '...';

        const range = (start, end) => {
          let length = end - start + 1;
          return Array.from({ length }, (_, idx) => idx + start);
        };
      const paginationRange = React.useMemo(() => {
          const totalPageCount = Math.ceil(totalCount / pageSize);

          // Pages count is determined as siblingCount + firstPage + lastPage + currentPage + 2*DOTS
          const totalPageNumbers = siblingCount + 5;

          /*
            Case 1:
            If the number of pages is less than the page numbers we want to show in our
            paginationComponent, we return the range [1..totalPageCount]
          */
          if (totalPageNumbers >= totalPageCount) {
            return range(1, totalPageCount);
          }
        
          /*
            Calculate left and right sibling index and make sure they are within range 1 and totalPageCount
          */
          const leftSiblingIndex = Math.max(currentPage - siblingCount, 1);
          const rightSiblingIndex = Math.min(
            currentPage + siblingCount,
            totalPageCount
          );

          /*
            We do not show dots just when there is just one page number to be inserted between the extremes of sibling and the page limits i.e 1 and totalPageCount. Hence we are using leftSiblingIndex > 2 and rightSiblingIndex < totalPageCount - 2
          */
          const shouldShowLeftDots = leftSiblingIndex > 2;
          const shouldShowRightDots = rightSiblingIndex < totalPageCount - 2;

          const firstPageIndex = 1;
          const lastPageIndex = totalPageCount;

          /*
            Case 2: No left dots to show, but rights dots to be shown
          */
          if (!shouldShowLeftDots && shouldShowRightDots) {
            let leftItemCount = 3 + 2 * siblingCount;
            let leftRange = range(1, leftItemCount);

            return [...leftRange, DOTS, totalPageCount];
          }

          /*
            Case 3: No right dots to show, but left dots to be shown
          */
          if (shouldShowLeftDots && !shouldShowRightDots) {
            
            let rightItemCount = 3 + 2 * siblingCount;
            let rightRange = range(
              totalPageCount - rightItemCount + 1,
              totalPageCount
            );
            return [firstPageIndex, DOTS, ...rightRange];
          }
          
          /*
            Case 4: Both left and right dots to be shown
          */
          if (shouldShowLeftDots && shouldShowRightDots) {
            let middleRange = range(leftSiblingIndex, rightSiblingIndex);
            return [firstPageIndex, DOTS, ...middleRange, DOTS, lastPageIndex];
          }
        }, [totalCount, pageSize, siblingCount, currentPage]);

        return paginationRange;
      };

      const Pagination = props => {
        const DOTS = '...';
        const {
          onPageChange,
          totalCount,
          siblingCount = 1,
          currentPage,
          pageSize,
          className
        } = props;

        const paginationRange = usePagination({
          currentPage,
          totalCount,
          siblingCount,
          pageSize
        });
        

        if (currentPage === 0 || paginationRange.length < 2) {
          return null;
        }

        const onNext = () => {
          onPageChange(currentPage + 1);
        };


        const onPrevious = () => {
          onPageChange(currentPage - 1);
        };

        let lastPage = paginationRange[paginationRange.length - 1];
        return (
          <ul
            className="flex list-none"
          >
            <li
              className={`${currentPage === 1 && "pointer-events-none hover:bg-transparent hover:cursor-default"} hover:cursor-pointer hover:bg-slate-300 py-0 px-3 h-8 text-center my-auto mx-1 flex box-border align-center tracking-[0.01071em] rounded-2xl text-[12px] min-w-[32px]`}
              onClick={onPrevious}
            >
              <div className={`${currentPage === 1 ? "before:border-r-[rgba(0, 0, 0, 0.43)] before:border-t-[rgba(0, 0, 0, 0.43)]" : "before:border-r-black before:border-t-black"} rotate-[-135deg] before:relative before:content-[''] before:inline-block before:w-2 before:h-2 before:border-r-2 before:border-t-2`} />
            </li>

            {paginationRange.map(pageNumber => {
              if (pageNumber === DOTS) {
                return <li key={pageNumber} className="py-0 px-3 h-8 text-center my-auto mx-1 flex box-border align-center tracking-[0.01071em] rounded-2xl text-[12px] min-w-[32px]">&#8230;</li>;
              }

              return (
                <li key={pageNumber}
                className={`${pageNumber === currentPage && "bg-slate-500"} hover:cursor-pointer hover:bg-slate-300 py-0 px-3 h-8 text-center my-auto mx-1 flex box-border align-center tracking-[0.01071em] rounded-2xl text-[12px] min-w-[32px]`}
                    // selected: 
               
                  onClick={() => onPageChange(pageNumber)}
                >
                  {pageNumber}
                </li>
              );
            })}
            <li
              className={`${currentPage === lastPage && "pointer-events-none hover:bg-transparent hover:cursor-default"} hover:cursor-pointer hover:bg-slate-300 py-0 px-3 h-8 text-center my-auto mx-1 flex box-border align-center tracking-[0.01071em] rounded-2xl text-[12px] min-w-[32px]`}
              onClick={onNext}
            >
                <div className={`${currentPage === lastPage ? "before:border-r-[rgba(0, 0, 0, 0.43)] before:border-t-[rgba(0, 0, 0, 0.43)]" : "before:border-r-black before:border-t-black"} rotate-45 before:relative before:content-[''] before:inline-block before:w-2 before:h-2 before:border-r-2 before:border-t-2`} />
            </li>
          </ul>
        );
      };

      let PageSize = 10;

      function Main () {
        const [filteredMaterials,setFilteredMaterials] = React.useState(materials)

        const [currentPage, setCurrentPage] = React.useState(1);

        const currentTableData = React.useMemo(() => {
          const firstPageIndex = (currentPage - 1) * PageSize;
          const lastPageIndex = firstPageIndex + PageSize;
          return filteredMaterials.slice(firstPageIndex, lastPageIndex);
        }, [currentPage, filteredMaterials]);
        
        const [active, setActive] = React.useState('Все')
        const handleColor = (menuItem) => {
          setActive(menuItem)
        }
        return (
          <main className="mb-20 lg:px-[100px]">
            <article className="flex mt-16 flex-col md:flex-row">
              <section className="md:block mx-auto">
                <div className="text-5xl font-light mb-10">Материалы</div>
                <ul className="text-category font-bold text-xl flex gap-4 items-center md:block">
                  <li className={`${active === 'Все' && "text-main"} my-4 cursor-pointer custom_category_li hover:text-main`} onClick={()=>{setFilteredMaterials(materials); handleColor('Все')}}>Все</li>
                  {category?.map((item)=>
                    <List active={active} handleColor={handleColor} key={item?.temp_custom_category} item={item} setFilteredMaterials={setFilteredMaterials} setCurrentPage={setCurrentPage}/>
                  )}              
                </ul>
              </section>
              <section className="mx-4 md:ml-20 font-light text-xl grid gap-y-10 mb-10">
                <ul className="inline-flex -space-x-px mx-auto">
                  <Pagination
                    className="pagination-bar"
                    currentPage={currentPage}
                    totalCount={filteredMaterials.length}
                    pageSize={PageSize}
                    onPageChange={page => setCurrentPage(page)}
                  />
                </ul>
                {currentTableData?.map((item) => 
                  <div key={item?.id} className="flex gap-x-10 italic flex-col md:flex-row">
                    <img className="md:w-[300px] md:h-[300px] object-cover" src={item?.material_image} />
                    <div>
                      <a href={`/fond1/material?id=${item?.id}`} target='_blank'>
                        <p className="font-light text-3xl hover:text-main cursor-pointer">{item?.title}</p>
                      </a>
                      <p className="my-4 text-base text-category">{item?.preview_date}</p>
                      <p className="font-thin text-xl">
                        {item?.predprosmotr}
                      </p>
                    </div>
                  </div>
                  )}
              </section>
            </article>
          </main>
        )
      }
      ReactDOM.render(
        <App/>,
        document.getElementById('root')
      )
    </script>
    <?php get_footer() ?>
    <!-- <script>
      <div className="custom_category_div" style={{display:"none"}}>{item?.custom_category_rus}</div>
      $(".custom_category_li").on("click", function()
      {  
        var selected_category = $(this).html();
        
        if (selected_category == 'Все')
          $(".custom_category_div").parent().show();
        else
          $('.custom_category_div').each(function(i, obj) 
          {
            if ($(obj).html() != selected_category)
              $(obj).parent().hide();
            else
              $(obj).parent().show();
          });

      });
    </script>   -->
  </body>
</html>
