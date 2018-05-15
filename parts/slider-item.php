<?php
$t_abstract = 'This study examined in detail the population structure of Escherichia coli from healthy adults with respect to the prevalence of antibiotic resistance and specific resistance determinants. E. coli isolated from the faeces of 20 healthy adults not recently exposed to antibiotics was tested for resistance to ten antibiotics and for carriage of integrons and resistance determinants using PCR. Strain diversity was assessed using biochemical and molecular criteria. E. coli was present in 19 subjects at levels ranging from 2.0×104 to 1.7×108 c.f.u. (g faeces)−1. Strains resistant to one to six antibiotics were found at high levels (>30 %) in only ten individuals, but at significant levels (>0.5 %) in 14. Resistant isolates with the same phenotype from the same individual were indistinguishable, but more than one susceptible strain was sometimes found. Overall, individuals harboured one to four E. coli strains, although in 17 samples one strain was dominant (>70 % of isolates). Eighteen strains resistant to ampicillin, sulfamethoxazole, tetracycline and trimethoprim in 15 different combinations were observed. One resistant strain was carried by two unrelated individuals and a susceptible strain was shared by two cohabiting subjects. Two minority strains were derivatives of a more abundant resistant strain in the same sample, showing that continuous evolution is occurring in vivo. The trimethoprim-resistance genes dfrA1, dfrA5, dfrA7, dfrA12 or dfrA17 were in cassettes in a class 1 or class 2 integron. Ampicillin resistance was conferred by the bla TEM gene, sulfamethoxazole resistance by sul1, sul2 or sul3 and tetracycline resistance by tetA(A) or tetA(B). Chloramphenicol resistance (cmlA1 gene) was detected only once. Phylogenetic groups A and B2 were more common than B1 and D. Commensal E. coli of healthy humans represent an important reservoir for numerous antibiotic-resistance genes in many combinations. However, measuring the true extent of resistance carriage in commensal E. coli requires in-depth analysis.';
$t_names = 'Jannine K. Bailey, Jeremy L. Pinyon, Sashindran Anantham, Ruth M. Hall';
?>
<div>
	<div class="cardArticle-date">NOVEMBER 2010</div>
	<a class="cardArticle-title">
		<?php the_title(); ?>
	</a>
	<div class="cardArticle-persons">
		<?php if (get_field('article-authors')) { the_field('article-authors'); } else { echo $t_names; } ?>
	</div>
	<div class="cardAbstract">
		<?php echo $t_abstract; ?>
	</div>
	<div class="cardArticle-buttons">
		<button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
		<a class="btn btn-primary" href="<?php the_permalink(); ?>">Open</a>
	</div>
</div>
