#!/usr/bin/python

# A recommendation system based on Apriori algorithm
# @input:  tagset.txt - each row is a shopping cart of a user
# @param:  minsup - minimal support
# @output: closed frequent patterns 
# @final output: recommend.txt - tag friends for each tag
# we use a dictionary to stores patterns = {itemset: support}
# keys (itemset) are stored as strings, e.g. 'test prep, sports, daily necessity'
# itemsets are converted into sets before operations
# values (support) are integers

from itertools import combinations

# convert a set to an ordered string
def set2str(aset):
    astr = ''
    alist = []
    for i in aset:
        alist.append(i)
    alist.sort()
    for i in alist:
        astr += str(i)
        astr += ", "
    astr = astr[:-2]
    return astr
# convert a string to a set
def str2set(astr):
    return set(astr.split(", "))


# scan DB to check the candidate
# @param cand [list of strings], patterns [dict]
# @return the checked freqent itemset [list of strings]
def checkFreq(cand, patterns, minsup, database):
    freq = []
    for candidate in cand:
        # scan DB and get the support of the candidate
        sup = 0
        candidate_set = str2set(candidate)
        for transaction in database:
            if candidate_set.issubset(set(transaction)):
                sup += 1
        # check against minsup
        if sup >= minsup:
            freq.append(candidate)
            patterns[candidate] = sup
        freq.sort()
    return freq


# check if the superset is valid according to Apriori Thm
# @return true if all k_subset of the k+1_superset is frequent
def checkValidSuperset(k, superset, freq_curr):
    for i in combinations(superset, k):
        setstr = set2str(set(i))
        if setstr not in freq_curr:
            return False
    return True

# generate k+1_candidate from k_frequent_itemset, 
# @param freq_curr [a list of str]
# @return cand_next [a list of str]
def genCand(freq_curr):
    
    k = len(freq_curr[0].split())
    cand_next = []
    
    for i in combinations(freq_curr,2):
        subs0, subs1 = i
        superset = str2set(subs0) | str2set(subs1)
        if len(superset) == len(str2set(subs0)) + 1:
            if checkValidSuperset(k, superset, freq_curr) == True:
                supersetstr = set2str(superset)
                if supersetstr not in cand_next:
                    cand_next.append(supersetstr)
                    
    return cand_next


# main Apriori algorithm
# @return closed patterns [ ( string(pattern), int(support) ) ]
def mineClosedPatterns(database, minsup):
    patterns = {}
    cand = []
    freq = []
    
    # 1-candidate
    for transaction in database:
        for item in transaction:
            if item not in cand:
                cand.append(item)
    cand.sort()
    
    # generate itemsets based on Apriori algorithm
    while len(cand) != 0:
        freq = checkFreq(cand, patterns, minsup, database)
        cand = genCand(freq)
    
    # only keep closed patterns
    closed_patterns = patterns.copy()
    for pat in patterns:
        for other_pat in patterns:
            if str2set(pat) < str2set(other_pat) and patterns[pat] <= patterns[other_pat]:                    
                del closed_patterns[pat]
                break
    
    # sort by support
    ret = sorted(closed_patterns.items(), key = lambda kv:(-kv[1], kv[0]))

    return ret



### __main__
minsup = 2 ### to be changed
fo = open('py/tagset.txt') ### py/tagset.txt
lines = fo.readlines()
database = []
for line in lines:
    database.append(sorted(line.strip().split(",")))
fo.close()

# print(database)
closed_patterns = mineClosedPatterns(database, minsup)
# print(closed_patterns)

recommend = {}
for tagset,_ in closed_patterns:
    tags = tagset.split(", ")
    tagset = str2set(tagset)
    for tag in tags:
        if tag not in recommend.keys():
            recommend[tag] = tagset - str2set(tag)
        elif len(recommend[tag]) < 3:
            recommend[tag] = tagset - str2set(tag) | recommend[tag]
        else:
            continue

fo = open("py/recommend.txt", 'a')
for k in recommend.keys():
    fo.write(k)
    fo.write(": ")
    for i in recommend[k]:
        fo.write(i)
        fo.write(", ")
    fo.write('\n')

fo.close()