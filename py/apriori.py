#!/usr/bin/python

# A recommendation system based on Apriori algorithm
# @input:  tagset.txt - each row is a shopping cart of a user
# @param:  minsup - minimal support
# @output: closed frequent patterns ####################################
# we use a dictionary - patterns = {itemset: support}
# keys (itemset) are stored as strings, e.g. 'A B'; and are converted into sets before operations
# values (support) are integers


minsup = 2 ### to be changed
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
        astr += ' '
    astr = astr[:-1]
    return astr
# convert a string to a set
def str2set(astr):
    return set(astr.split())


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
# @return patterns [dict]
def minePatterns(database, minsup):
    patterns = {}
    cand = []
    freq = []
    # 1-candidate
    for transaction in database:
        for item in transaction:
            if item not in cand:
                cand.append(item)
    cand.sort()

    while len(cand) != 0:
        freq = checkFreq(cand, patterns, minsup, database)
        cand = genCand(freq)
    return patterns


# extract the closed patterns out from patterns
def closedPattern(patterns):
    closed_patterns = patterns.copy()
    for pat in patterns:
        for other_pat in patterns:
            if str2set(pat) < str2set(other_pat) and patterns[pat] <= patterns[other_pat]:                    
                del closed_patterns[pat]
                break
    return closed_patterns
# extract the max patterns out from patterns
def maxPattern(patterns):
    max_patterns = patterns.copy()
    for pat in patterns:
        for other_pat in patterns:
            #print(other_pat)
            if str2set(pat) < str2set(other_pat):
                del max_patterns[pat]
                break
    return max_patterns


### print patterns to screen in the output format
def outPatterns(patterns):
    
    minsup = min(patterns.values())
    sup = max(patterns.values())
    
    while sup >= minsup:
        outlist = []
        for itemset in patterns:
            if patterns[itemset] == sup:
                outlist.append(itemset)
        outlist.sort()
        for itemset in outlist:
            print(str(sup) + ' [', end='')
            print(itemset, end='')
            print(']')
        sup -= 1
    
    return




###
fo = open('py/tagset.txt')
lines = fo.readlines()
database = []
for line in lines:
    database.append(sorted(line.split()))
fo.close()


patterns = minePatterns(database, minsup)
closed_patterns = closedPattern(patterns)
max_patterns = maxPattern(patterns)
outPatterns(patterns)
print()
outPatterns(closed_patterns)
print()
outPatterns(max_patterns)


fo = open("py/recommend.txt", "w")
str = "123"
fo.write( str )
fo.close()

